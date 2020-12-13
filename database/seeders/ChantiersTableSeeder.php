<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class ChantiersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('chantiers')->delete();

        \DB::table('chantiers')->insert(array (
            0 =>
            array (
                'id' => 1,
                'identifiant' => 'EBX_PJ2012-0001',
                'libelle' => 'premier chantier',
                'client_id' => 1,
                'entreprise_id' => 1,
                'etat_chantier_id' => 1,
                'date_debut' => '2020-12-09',
                'date_fin' => NULL,
                'created_at' => '2020-12-13 16:17:08',
                'updated_at' => '2020-12-13 16:17:08',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'identifiant' => 'EBX_PJ2012-0005 - Lanton',
                'libelle' => 'premier chantier',
                'client_id' => 1,
                'entreprise_id' => 1,
                'etat_chantier_id' => 1,
                'date_debut' => '2020-12-09',
                'date_fin' => NULL,
                'created_at' => '2020-12-13 16:17:08',
                'updated_at' => '2020-12-13 16:17:08',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'identifiant' => 'EBX_PJ2012-0006 - Cambes',
                'libelle' => 'premier chantier',
                'client_id' => 5,
                'entreprise_id' => 1,
                'etat_chantier_id' => 1,
                'date_debut' => '2020-12-09',
                'date_fin' => NULL,
                'created_at' => '2020-12-13 16:17:08',
                'updated_at' => '2020-12-13 16:17:08',
                'deleted_at' => NULL,
            ),

        ));


    }
}
