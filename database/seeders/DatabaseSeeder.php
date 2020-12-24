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
        $this->call(ChantiersTableSeeder::class);
        $this->call(DevisTableSeeder::class);
        $this->call(DeviFactureTableSeeder::class);
        $this->call(FacturesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ClientEntrepriseTableSeeder::class);
        $this->call(PaiementsTableSeeder::class);
        $this->call(FacturePaiementTableSeeder::class);
    }
}
