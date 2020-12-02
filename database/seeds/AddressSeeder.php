<?php

use App\Models\Address;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AddressSeeder extends Seeder
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
            $address = new Address();
            $address->city = $faker->city;
            $address->state = $faker->departmentName;
            $address->description = $faker->address;
            $address->user_id = $users[array_rand($users,1)]['id'];

            $address->save();
        }
    }
}
