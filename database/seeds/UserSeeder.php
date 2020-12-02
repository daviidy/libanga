<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');
        $type_array = ['admin','default','artiste'];

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->username = $faker->lastName.''.$faker->firstName;
            $user->email = $faker->unique()->email;
            $user->provider_id = 1;
            $user->provider = 1;
            $user->password = bcrypt('123456');
            $user->telephone = $faker->phoneNumber;
            $user->type = $type_array[array_rand($type_array,1)];
            $user->save();
        }
    }
}
