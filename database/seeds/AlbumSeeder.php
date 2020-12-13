<?php

use App\Models\Album;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AlbumSeeder extends Seeder
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
        for ($i = 0; $i < 100; $i++) {
            $album = new Album();
            $album->purchase_date = $faker->date($format = 'Y-m-d', $max = 'now');
            $album->title = $faker->sentence($nbWords = 2, $variableNbWords = true);
            $album->user_id = $users[array_rand($users,1)]['id'];

            $album->save();
        }
    }
}
