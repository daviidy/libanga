<?php

use App\Models\Album;
use App\Models\Chanson;
use Illuminate\Database\Seeder;

class ChansonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');
        $albums = Album::all()->toArray();
        for ($i = 0; $i < 100; $i++) {
            $album = new Chanson();
            $album->title =  $faker->sentence($nbWords = 2, $variableNbWords = true);
            $album->album_id = $albums[array_rand($albums,1)]['id'];

            $album->save();
        }
    }
}
