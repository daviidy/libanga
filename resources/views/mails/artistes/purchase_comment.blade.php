@extends('layouts.emails')
@section('content')
<section>
  <div class="p-md-5">
    <div class="card w-76 mx-auto">
      <div class="card-body">
        <div class="image-logo text-center p-3">
          <img src="https://libanga.rikudo.ci/assets/images/logo_libanga.png" width="150" alt="logo" class="img-fluid">
        </div>
        <div class="p-3">
          <h5 class="card-title">Bonjour {{ $detailCommande['artiste'] }}</h5>
          <p class="card-text">Un client vient de noter un de vos extratis pour sa commande sur Libanga.
             Pour rappel, voici les détails de la commande.</p>
             <p>
              <ul>
                  <li>Service : {{ $detailCommande['service'] }}</li>
                  <li>Client : {{ $detailCommande['client'] }}</li>
                  <li>Date de la commande{{ $detailCommande['date'] }}</li>
                  <li>Prix : {{ $detailCommande['price'] }} € </li>   
              </ul>
              Cliquez ci-dessous pour consulter la commande
             </p>
        </div>
        <div class="text-center p-3">
          <a href="{{ $url }}" class="btn font-weight-bold rounded-pill bg-btn">Aller sur le site</a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
