<?php

use App\Models\Service;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');
        $users = User::all()->toArray();
        for ($i = 0; $i < 30; $i++) {
            $services = new Service();
            $services->name = $faker->sentence($nbWords = 3, $variableNbWords = true);
            $services->type = $faker->sentence($nbWords = 3, $variableNbWords = true);
            $services->price = rand(500,50000);
            $services->user_id = $users[array_rand($users,1)]['id'];

            $services->save();
        }
    }
}
