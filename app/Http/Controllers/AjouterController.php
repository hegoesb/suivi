<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\entreprise;
use App\Models\type_client;
use App\Models\client;
use App\Models\client_entreprise;
use Validator;

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
            'titre'            => $entreprise['nom'].' - Ajouter Client',
            'descriptif'       => 'Le client sera ajouter à la table client commune aux deux entreprises. Un client peut appartenir aux deux entreprises',
            'type_client'      => $type_client,
            'choix_entreprise' => $choix_entreprise,
            'entreprise_id'    => $entreprise->id,
        ]);
    }

    public function postTable($entreprise_id, $table, Request $request)
    {


      $entreprises=entreprise::get();

      $this->validate($request, [
          'nom' => 'required|max:10|unique:clients',
          'nom_display' => 'required|max:40|unique:clients',
          'type_client_id' => 'required',
      ]);

      //Sauvergarde du nouveau materiel dans la table matériel
      $table_client = new client;
      $table_client->nom            = $request->all()['nom'];
      $table_client->nom_display    = $request->all()['nom_display'];
      $table_client->type_client_id = $request->all()['type_client_id'];
      $table_client->save();

      foreach ($entreprises as $key_entreprise => $entreprise) {
        foreach ($request->except(['_token']) as $key_resquest => $value) {
          if('entreprise_'.$entreprise->id==$key_resquest){
            $choix_entrepise[$key_entreprise][0]=$entreprise->id;
            $choix_entrepise[$key_entreprise][1]=$table_client->id;
          }
        }
      }
      foreach ($choix_entrepise as $key => $value) {
        $table_client_entreprise = new client_entreprise;
        $table_client_entreprise->entreprise_id = $value[0];
        $table_client_entreprise->client_id     = $value[1];
        $table_client_entreprise->save();
        # code...
      }


      return view('test', ['test' =>  $choix_entrepise, 'imputs' => '$table', 'comp' => $request->except(['_token'])]);

    }

}
