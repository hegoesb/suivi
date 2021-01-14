<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SousdossiersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


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
            20 =>
            array (
                'id' => 21,
                'dossier_id' => 5,
                'libelle' => '21_Plans_Client',
                'created_at' => '2021-01-05 00:00:00',
                'updated_at' => '2021-01-05 00:00:00',
            ),
        ));


    }
}
