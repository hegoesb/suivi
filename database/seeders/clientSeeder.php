<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class clientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('clients')->delete();
        \DB::table('clients')->insert(array (
            0 =>
            array (
                'id' => 1,
                'type_client_id' => 1,
                'nom' => 'Heris C',
                'nom_display' => 'Heris Construction',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'type_client_id' => 1,
                'nom' => 'Gujan PIA',
                'nom_display' => 'SCCV GUJAN BATAILLE [Groupe PIA]',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'type_client_id' => 1,
                'nom' => 'Home A',
                'nom_display' => 'Home Architectures',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'type_client_id' => 2,
                'nom' => 'Massia',
                'nom_display' => 'Massia Caroline',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            4 =>
            array (
                'id' => 5,
                'type_client_id' => 1,
                'nom' => 'At Minga',
                'nom_display' => 'Atelier Minga',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            5 =>
            array (
                'id' => 6,
                'type_client_id' => 2,
                'nom' => 'Joandet',
                'nom_display' => 'Joandet',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            6 =>
            array (
                'id' => 7,
                'type_client_id' => 1,
                'nom' => 'Hauselmann',
                'nom_display' => 'Hauselmann Architecture',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            7 =>
            array (
                'id' => 8,
                'type_client_id' => 2,
                'nom' => 'Peron',
                'nom_display' => 'Peron',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            8 =>
            array (
                'id' => 9,
                'type_client_id' => 2,
                'nom' => 'Rosina',
                'nom_display' => 'Rosina Cyril',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            9 =>
            array (
                'id' => 10,
                'type_client_id' => 2,
                'nom' => 'Ballanger',
                'nom_display' => 'Ballanger',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            10 =>
            array (
                'id' => 11,
                'type_client_id' => 1,
                'nom' => 'MCC',
                'nom_display' => 'MCC Construction',
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
        ));

        \DB::table('client_entreprise')->delete();
        \DB::table('client_entreprise')->insert(array (
            0 =>
            array (
                'client_id' => 1,
                'entreprise_id' => 1,
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            1 =>
            array (
                'client_id' => 2,
                'entreprise_id' => 1,
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            2 =>
            array (
                'client_id' => 3,
                'entreprise_id' => 1,
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            3 =>
            array (
                'client_id' => 4,
                'entreprise_id' => 1,
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            4 =>
            array (
                'client_id' => 5,
                'entreprise_id' => 1,
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            5 =>
            array (
                'client_id' => 6,
                'entreprise_id' => 1,
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            6 =>
            array (
                'client_id' => 7,
                'entreprise_id' => 1,
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            7 =>
            array (
                'client_id' => 8,
                'entreprise_id' => 1,
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            8 =>
            array (
                'client_id' => 9,
                'entreprise_id' => 1,
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            9 =>
            array (
                'client_id' => 10,
                'entreprise_id' => 1,
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),
            10 =>
            array (
                'client_id' => 11,
                'entreprise_id' => 1,
                'created_at' => '2020-12-12 00:00:00',
                'updated_at' => '2020-12-12 00:00:00',
            ),







        ));


    }
}
