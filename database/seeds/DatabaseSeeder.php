<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(PurchaseSeeder::class);
        $this->call(ChansonSeeder::class);

    }
}
