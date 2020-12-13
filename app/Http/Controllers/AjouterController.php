<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\entreprise;
use App\Models\type_client;

class AjouterController extends Controller
{
    public function __construct()
    {
        $this->chemin  = 'pages.ajouter.';
    }

    public function viewTable($entreprise_id,$table)
    {
        //Selection nom de l'entreprise pour le titre de la page
        $entreprise=entreprise::where('id',$entreprise_id)->first();

        //Selection de données nécessaire au formulaire
        $type_clients=type_client::get();
        foreach ($type_clients as $key_1 => $value) {
          $type_client[$key_1][0]=$value['id'];
          $type_client[$key_1][1]=$value['nom_display'];
        }
        $entreprises=entreprise::get();
        foreach ($entreprises as $key_2 => $value) {
          $choix_entreprise[$key_2][0]=$value['id'];
          $choix_entreprise[$key_2][1]=$value['nom_display'];
        }

        // return view('test', ['test' =>  $choix_entreprise, 'imputs' => '$a', 'comp' => '$table'.' ']);

        return view($this->chemin.$table.'_select2',[
            'titre'             => $entreprise['nom'].' - Ajouter Client',
            'descriptif'        => 'Le client sera ajouter à la table client commune aux deux entreprises',
            'type_client'       => $type_client,
            'choix_entreprise' => $choix_entreprise,
        ]);







    }

}
