<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class generic_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('collaborateurs')->delete();
        \DB::table('collaborateurs')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => 'FHU',
                'nom_display' => 'Fabien Hegoburu',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'AFR',
                'nom_display' => 'Antoine Fournier',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'nom' => 'RCS',
                'nom_display' => 'Remy Carpentras',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
        ));


        \DB::table('entreprises')->delete();
        \DB::table('entreprises')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => 'EBX',
                'nom_display' => 'EDIS Bordeaux',
                'prefixe_chantier' => 'EBX_PJ',
                'prefixe_devis' => 'EBX_DE',
                'prefixe_facture' => 'EBX_FA',
                'prefixe_dossier' => 'BDX',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'EPB',
                'nom_display' => 'EDIS Pays Basque',
                'prefixe_chantier' => 'EPB_PJ',
                'prefixe_devis' => 'EPB_DE',
                'prefixe_facture' => 'EPB_FA',
                'prefixe_dossier' => 'PB',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
        ));

        \DB::table('type_clients')->delete();
        \DB::table('type_clients')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => 'Pro',
                'nom_display' => 'Professionel',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'Par',
                'nom_display' => 'Particulier',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
        ));

        \DB::table('type_devis')->delete();
        \DB::table('type_devis')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => 'P',
                'nom_display' => 'Principal',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'A',
                'nom_display' => 'Additif',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
        ));

        \DB::table('type_factures')->delete();
        \DB::table('type_factures')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => 'Ac',
                'nom_display' => 'Acompte',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'Sit',
                'nom_display' => 'Situation',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'nom' => 'Sol',
                'nom_display' => 'Solde',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
        ));

        \DB::table('type_reglements')->delete();
        \DB::table('type_reglements')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => 'Vir',
                'nom_display' => 'Virement',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'Ch',
                'nom_display' => 'Chéque',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
        ));

        \DB::table('etat_chantiers')->delete();
        \DB::table('etat_chantiers')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => '1-NG',
                'nom_display' => 'Negociation',
                'color' => 'warning',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => '2-SG',
                'nom_display' => 'Signé',
                'color' => 'success',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'nom' => '3-EC',
                'nom_display' => 'En Cours',
                'color' => 'primary',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'nom' => '4-TR',
                'nom_display' => 'Terminé (Chantier)',
                'color' => 'dark',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            4 =>
            array (
                'id' => 5,
                'nom' => '5-SD',
                'nom_display' => 'Soldé (DOE)',
                'color' => 'light-dark',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            5 =>
            array (
                'id' => 6,
                'nom' => '6-LI',
                'nom_display' => 'Litige',
                'color' => 'danger',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            6 =>
            array (
                'id' => 7,
                'nom' => '7-PU',
                'nom_display' => 'Perdu',
                'color' => 'light-danger',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
        ));

        \DB::table('etat_devis')->delete();
        \DB::table('etat_devis')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => 'N',
                'nom_display' => 'Negociation',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'A',
                'nom_display' => 'Accepté',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'nom' => 'S',
                'nom_display' => 'Signé',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'nom' => 'R',
                'nom_display' => 'Refusé',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),

        ));
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
        \DB::table('sousdossiers')->delete();
        \DB::table('sousdossiers')->insert(array (
            0 =>
            array (
                'id' => 1,
                'dossier_id' => 1,
                'libelle' => '11_Documents_Client',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'dossier_id' => 1,
                'libelle' => '21_Plans_Client',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'dossier_id' => 1,
                'libelle' => '31_Photo_Pré-Etude',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'dossier_id' => 2,
                'libelle' => '11_Documents_Client',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            4 =>
            array (
                'id' => 5,
                'dossier_id' => 2,
                'libelle' => '21_Plans_Client',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            5 =>
            array (
                'id' => 6,
                'dossier_id' => 2,
                'libelle' => '31_Photo_Pré-Etude',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            6 =>
            array (
                'id' => 7,
                'dossier_id' => 2,
                'libelle' => '22_Plans_EDIS',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            7 =>
            array (
                'id' => 8,
                'dossier_id' => 2,
                'libelle' => '32_Photo_Etude',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            8 =>
            array (
                'id' => 9,
                'dossier_id' => 3,
                'libelle' => '11_Documents_Client',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            9 =>
            array (
                'id' => 10,
                'dossier_id' => 3,
                'libelle' => '21_Plans_Client',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            10 =>
            array (
                'id' => 11,
                'dossier_id' => 3,
                'libelle' => '31_Photo_Pré-Etude',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            11 =>
            array (
                'id' => 12,
                'dossier_id' => 3,
                'libelle' => '22_Plans_EDIS',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            12 =>
            array (
                'id' => 13,
                'dossier_id' => 3,
                'libelle' => '32_Photo_Etude',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            13 =>
            array (
                'id' => 14,
                'dossier_id' => 3,
                'libelle' => '33_Photo_Chantier',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            14 =>
            array (
                'id' => 15,
                'dossier_id' => 3,
                'libelle' => '12_Documents_EDIS',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            15 =>
            array (
                'id' => 16,
                'dossier_id' => 4,
                'libelle' => '11_Documents_Client',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            16 =>
            array (
                'id' => 17,
                'dossier_id' => 4,
                'libelle' => '21_Plans_Client',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            17 =>
            array (
                'id' => 18,
                'dossier_id' => 4,
                'libelle' => '31_Photo_Pré-Etude',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            18 =>
            array (
                'id' => 19,
                'dossier_id' => 5,
                'libelle' => '33_Photo_Chantier',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),
            19 =>
            array (
                'id' => 20,
                'dossier_id' => 5,
                'libelle' => '22_Plans_EDIS',
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ),



        ));

    }
}
