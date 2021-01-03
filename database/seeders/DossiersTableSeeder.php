<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DossiersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dossiers')->delete();
        
        \DB::table('dossiers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'Terrain',
                'numero' => '311',
                'libelle' => 'Pre-Etudes',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'Terrain',
                'numero' => '312',
                'libelle' => 'Etudes-Chantiers',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'Terrain',
                'numero' => '313',
                'libelle' => 'DOE',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'Terrain',
                'numero' => '321',
                'libelle' => 'Projets_Perdus',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'type' => 'Terrain',
                'numero' => '331',
                'libelle' => 'Chantiers',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
        ));
        
        
    }
}