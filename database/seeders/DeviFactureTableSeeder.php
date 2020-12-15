<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeviFactureTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('devi_facture')->delete();

        \DB::table('devi_facture')->insert(array (
            0 =>
            array (
                'devi_id' => 2,
                'facture_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));


    }
}
