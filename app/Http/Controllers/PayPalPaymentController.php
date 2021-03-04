<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Purchase;
use App\Models\Service;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PayPalPaymentController extends Controller
{
    private $_api_context;
    private $mailController;

    public function __construct(MailController $mailController)
    {

        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
        $this->mailController = $mailController;
    }

    public function payWithPaypal()
    {
        return redirect()->route('artistes.show',auth()->user()->id);
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $data_purchase = Purchase::create([
            "service_id"=>$request->id,
            "user_id"   =>auth()->user()->id,
            "status"    =>"en attente",
            "purchase_state"    =>"en cours",
            "names" => $request->names
        ]);
        $request['amount'] = $request->price;
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName($request->name)
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('artistes.show',auth()->user()->id);
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('artistes.show',auth()->user()->id);
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            try{
                $service = Service::where('id', $request->id)->with('users')->first();
                $date = Carbon::now()->format('d/m/Y');
                $detailCommandeClient = ['service'=>$service->name,'artiste'=>$service->users->username,'email'=>$service->users->email,'client'=>Auth::user()->username,
                 'price'=>$request->price,'date'=>$date];
                $detailCommandeArtist = ['service'=>$service->name,'artiste'=>$service->users->username,'client'=>Auth::user()->username,
                'email'=>$service->users->email,
                 'price'=>$request->price,'date'=>$date];
                 $this->sendNotificationToArtist($detailCommandeArtist);
                 $this->sendNotificationToClient($detailCommandeClient);
            }catch(\Exception $ex){
                throw new Exception($ex);
            }           
            
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
    	return Redirect::route('artistes.show',auth()->user()->id);
    }

    public function sendNotificationToArtist($detailCommande)
    {
        try{
            $this->mailController->ArtistPurshaseSuccess($detailCommande);
        }catch(\Exception $ex){
            throw new Exception($ex);
        }  
    }
    public function sendNotificationToClient($detailCommande)
    {
        try{
            $this->mailController->ClientPurshaseSuccess($detailCommande);
        }catch(\Exception $ex){
            throw new Exception($ex);
        }  
    }

    public function getPaymentStatus(Request $request)
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Paiement échoué');
            return Redirect::route('artistes.show',auth()->user()->id);
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            \Session::put('success','Paiement validé !!');

            $update_purchase = Purchase::where('user_id',auth()->user()->id)->get()->last();
            $update_purchase->update(['status'=>'validé']);
            return Redirect::route('dashboard');
        }

        \Session::put('error','Paiement échoué!!');
		return Redirect::route('artistes.show',auth()->user()->id);
    }
}
