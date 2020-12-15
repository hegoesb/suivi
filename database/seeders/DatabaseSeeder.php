<?php

namespace Database\Seeders;

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
        $this->call(generic_table::class);
        $this->call(clientSeeder::class);
        $this->call(ChantiersTableSeeder::class);
        $this->call(DevisTableSeeder::class);
        $this->call(DeviFactureTableSeeder::class);
        $this->call(FacturesTableSeeder::class);
    }
}
