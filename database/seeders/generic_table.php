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
                'nom' => 'Ad',
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

        \DB::table('type_paiements')->delete();
        \DB::table('type_paiements')->insert(array (
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
                'nom' => 'Nego',
                'nom_display' => 'Negociation',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'EC',
                'nom_display' => 'En Cours',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'nom' => 'RG',
                'nom_display' => 'Retenue de Garantie',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'nom' => 'T',
                'nom_display' => 'Terminé',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            4 =>
            array (
                'id' => 5,
                'nom' => 'P',
                'nom_display' => 'Perdu',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            5 =>
            array (
                'id' => 6,
                'nom' => 'Li',
                'nom_display' => 'Litige',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),

        ));

        \DB::table('etat_devis')->delete();
        \DB::table('etat_devis')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => 'Nego',
                'nom_display' => 'Negociation',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'AC',
                'nom_display' => 'Accepté',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'nom' => 'Si',
                'nom_display' => 'Signé',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'nom' => 'Rf',
                'nom_display' => 'Refusé',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),

        ));

    }
}
