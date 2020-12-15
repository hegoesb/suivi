<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FacturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('factures')->delete();

        \DB::table('factures')->insert(array (
            0 =>
            array (
                'id' => 1,
                'numero' => 'EBX_FA01',
                'chantier_id' => 3,
                'client_id' => 5,
                'bilan_id' => NULL,
                'entreprise_id' => 1,
                'type_facture_id' => 1,
                'total_ht' => 10000.0,
                'total_ttc' => 12000.0,
                'tva' => 2000.0,
                'collaborateur_id' => 2,
                'date_creation' => '2020-12-07',
                'date_echeance' => '2020-12-14',
                'date_envoie' => '2020-12-21',
                'date_paye' => NULL,
                'created_at' => '2020-12-14 21:19:47',
                'updated_at' => '2020-12-14 21:19:47',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'numero' => 'EBX_FA024',
                'chantier_id' => 3,
                'client_id' => 5,
                'bilan_id' => NULL,
                'entreprise_id' => 1,
                'type_facture_id' => 1,
                'total_ht' => 10000.0,
                'total_ttc' => 12000.0,
                'tva' => 2000.0,
                'collaborateur_id' => 1,
                'date_creation' => '2020-12-07',
                'date_echeance' => '2020-12-22',
                'date_envoie' => '2020-12-14',
                'date_paye' => NULL,
                'created_at' => '2020-12-15 13:49:24',
                'updated_at' => '2020-12-15 13:49:24',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'numero' => 'EBX_FA025',
                'chantier_id' => 3,
                'client_id' => 5,
                'bilan_id' => NULL,
                'entreprise_id' => 1,
                'type_facture_id' => 2,
                'total_ht' => 10000.0,
                'total_ttc' => 12000.0,
                'tva' => 2000.0,
                'collaborateur_id' => 1,
                'date_creation' => '2020-12-07',
                'date_echeance' => '2020-12-21',
                'date_envoie' => '2020-12-14',
                'date_paye' => NULL,
                'created_at' => '2020-12-15 13:50:50',
                'updated_at' => '2020-12-15 13:50:50',
                'deleted_at' => NULL,
            ),
        ));


    }
}
