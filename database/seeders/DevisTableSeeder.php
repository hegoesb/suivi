<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DevisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('devis')->delete();

        \DB::table('devis')->insert(array (
            0 =>
            array (
                'id' => 1,
                'numero' => 'EBX_DE2012-0012',
                'lot' => 'description',
                'chantier_id' => 1,
                'entreprise_id' => 1,
                'client_id' => 1,
                'bilan_id' => NULL,
                'etat_devi_id' => 1,
                'type_devi_id' => 1,
                'collaborateur_id' => 3,
                'total_ht' => 10000.0,
                'total_ttc' => 12000.0,
                'tva' => 2000.0,
                'progbox_sauve' => NULL,
                'date_creation' => '2020-12-09',
                'date_envoie' => NULL,
                'date_signature' => NULL,
                'created_at' => '2020-12-13 20:03:06',
                'updated_at' => '2020-12-13 20:03:06',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'numero' => 'EBX_DE2012-0014',
                'lot' => 'description',
                'chantier_id' => 3,
                'entreprise_id' => 1,
                'client_id' => 4,
                'bilan_id' => NULL,
                'etat_devi_id' => 3,
                'type_devi_id' => 1,
                'collaborateur_id' => 1,
                'total_ht' => 20000.0,
                'total_ttc' => 24000.0,
                'tva' => 4000.0,
                'progbox_sauve' => 1,
                'date_creation' => '2020-12-09',
                'date_envoie' => '2020-12-09',
                'date_signature' => '2020-12-11',
                'created_at' => '2020-12-13 20:03:06',
                'updated_at' => '2020-12-13 20:03:06',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'numero' => 'EBX_DE2012-0015',
                'lot' => 'description',
                'chantier_id' => 3,
                'entreprise_id' => 1,
                'client_id' => 4,
                'bilan_id' => NULL,
                'etat_devi_id' => 2,
                'type_devi_id' => 2,
                'collaborateur_id' => 1,
                'total_ht' => 100.0,
                'total_ttc' => 120.0,
                'tva' => 20.0,
                'progbox_sauve' => NULL,
                'date_creation' => '2020-12-09',
                'date_envoie' => NULL,
                'date_signature' => NULL,
                'created_at' => '2020-12-13 20:03:06',
                'updated_at' => '2020-12-13 20:03:06',
                'deleted_at' => NULL,
            ),
        ));


    }
}
