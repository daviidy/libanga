<?php

use App\Models\Purchase;
use App\Models\Service;
use App\User;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::all()->toArray();
        $services = Service::all()->toArray();
        $array_status=['en attente','validé'];
        for ($i = 0; $i < 100; $i++) {
            $album = new Purchase();
            $album->service_id = $services[array_rand($services,1)]['id'];
            $album->status = $array_status[array_rand($array_status,1)];
            $album->user_id = $users[array_rand($users,1)]['id'];

            $album->save();
        }
    }
}
