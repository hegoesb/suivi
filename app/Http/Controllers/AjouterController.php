<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TableauRepository;
use App\Models\entreprise;
use App\Models\type_client;
use App\Models\type_devi;
use App\Models\devi;
use App\Models\client;
use App\Models\client_entreprise;
use App\Models\chantier;
use App\Models\collaborateur;
use Validator;

class AjouterController extends Controller
{
    public function __construct(TableauRepository $TableauRepository)
    {
        $this->chemin  = 'pages.ajouter.';
        $this->chemin_tableau  = 'pages.tableaux.';
        $this->tableauRepository = $TableauRepository;
    }

    public function viewTable($entreprise_id,$table)
    {
        //Selection nom de l'entreprise pour le titre de la page
        $entreprise=entreprise::where('id',$entreprise_id)->first();

        if($table=='clients'){

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
              'titre'            => $entreprise['nom'].' - Ajouter un client',
              'descriptif'       => 'Le client sera ajouter à la table client commune aux deux entreprises. Un client peut appartenir aux deux entreprises',
              'type_client'      => $type_client,
              'choix_entreprise' => $choix_entreprise,
              'entreprise_id'    => $entreprise->id,
          ]);
        }elseif ($table=='chantiers') {

          //Selection de données nécessaire au formulaire
          $clients=entreprise::with('client')->where('id',$entreprise->id)->first();
          foreach ($clients['client'] as $key_2 => $value) {
            $client[$key_2][0]=$value['id'];
            $client[$key_2][1]=$value['nom_display'];
          }
          // return view('test', ['test' =>  $client, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_select2',[
              'titre'      => $entreprise['nom'].' - Ajouter un chantier',
              'descriptif' => 'Le chantier sera associé à l\'entreprise '.$entreprise['nom_display'].'.',
              'clients'    => $client,
              'entreprise' => $entreprise,
          ]);

          // return view('test', ['test' =>  $choix_entreprise, 'imputs' => '$a', 'comp' => '$table'.' ']);

        }elseif ($table=='devis') {

          //Selection de données nécessaire au formulaire
          $chantiers=chantier::with('client')->where('entreprise_id',$entreprise->id)->orderBy('identifiant','desc')->get();
          foreach ($chantiers as $key_2 => $value) {
            $chantier[$key_2][0]=$value['id'];
            $chantier[$key_2][1]=$value['identifiant'];
          }

          $type_devis=type_devi::get();
          foreach ($type_devis as $key_2 => $value) {
            $type_devi[$key_2][0]=$value['id'];
            $type_devi[$key_2][1]=$value['nom_display'];
          }

          $collaborateurs=collaborateur::orderBy('nom','asc')->get();
          foreach ($collaborateurs as $key_2 => $value) {
            $collaborateur[$key_2][0]=$value['id'];
            $collaborateur[$key_2][1]=$value['nom_display'];
          }
          // return view('test', ['test' =>  $type_devi, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_select2',[
              'titre'          => $entreprise['nom'].' - Ajouter un devis',
              'descriptif'     => 'Le devis sera associé à l\'entreprise '.$entreprise['nom_display'].'.',
              'chantiers'      => $chantier,
              'type_devis'     => $type_devi,
              'collaborateurs' => $collaborateur,
              'entreprise'     => $entreprise,
          ]);

          // return view('test', ['test' =>  $choix_entreprise, 'imputs' => '$a', 'comp' => '$table'.' ']);

        }







    }

    public function postTable($entreprise_id, $table, Request $request)
    {


      $entreprises=entreprise::get();
      $entreprise_id=entreprise::where('id',$entreprise_id)->first();

      if($table=='clients'){
        $this->validate($request, [
            'nom' => 'required|max:10|unique:clients',
            'nom_display' => 'required|max:40|unique:clients',
            'type_client_id' => 'required',
        ]);

        //Sauvergarde du nouveau client
        $table_client = new client;
        $table_client->nom            = $request->all()['nom'];
        $table_client->nom_display    = $request->all()['nom_display'];
        $table_client->type_client_id = $request->all()['type_client_id'];
        $table_client->save();

        //Sauvergarde de la relation client_entreprise
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
        }

        $type_clients=type_client::get();
        $data=$this->tableauRepository->selection_clients();

        return view($this->chemin_tableau.$table.'_datatables',[
            'titre'         => $entreprise['nom'].' - Tableau Client',
            'descriptif'    => 'Liste des clients appartenant aux deux entreprises',
            'data'          => $data,
            'type_clients'  => $type_clients,
            'entreprises'   => $entreprises,
            'colonne_order' => 0,
            'ordre'         => 'desc',
        ]);

      }elseif($table=='chantiers'){

        $this->validate($request, [
            'identifiant' => 'required|max:50|unique:chantiers',
            'libelle'     => 'required|max:50',
            'client_id'   => 'required',
            'date_debut'  => 'required',
        ]);

        //Sauvergarde du nouveau chantier
        $table_chantier = new chantier;
        $table_chantier->identifiant      = $request->all()['identifiant'];
        $table_chantier->libelle          = $request->all()['libelle'];
        $table_chantier->client_id        = $request->all()['client_id'];
        $table_chantier->entreprise_id    = $entreprise_id->id;
        $table_chantier->date_debut       = $request->all()['date_debut'];
        $table_chantier->etat_chantier_id = 1;
        $table_chantier->save();

        $data=chantier::with('client','etat_chantier')->where('entreprise_id',$entreprise->id)->get();
        // return view('test', ['test' =>  $data, 'imputs' => '$a', 'comp' => $request.' ']);

        return view($this->chemin.$table.'_datatables',[
            'titre'        => $entreprise['nom'].' - Tableau Chantier',
            'descriptif'   => 'Liste des chantiers appartenant à l\'entreprise '.$entreprise['nom_display'].'.',
            'data'         => $data,
            // 'type_clients' => $type_clients,
            // 'entreprises'  => $entreprises,
            'colonne_order' => 0,
            'ordre'         => "desc",
        ]);


      }elseif($table=='devis'){

        $this->validate($request, [
            'numero'           => 'required|max:15|unique:devis',
            'lot'              => 'required|max:50',
            'chantier_id'      => 'required',
            'type_devi_id'     => 'required',
            'collaborateur_id' => 'required',
            'total_ht'         => 'required',
            'total_ttc'        => 'required',
            'date_creation'    => 'required',
        ]);
        // return view('test', ['test' =>  '$data', 'imputs' => '$a', 'comp' => $request->except(['_token'])]);

        //Sauvergarde du nouveau devis
        $client=chantier::where('id',$request->all()['chantier_id'])->first();

        $table_devi = new devi;
        $table_devi->numero        = $request->all()['numero'];
        $table_devi->lot           = $request->all()['lot'];
        $table_devi->chantier_id   = $request->all()['chantier_id'];
        $table_devi->type_devi_id  = $request->all()['type_devi_id'];
        $table_devi->total_ht      = $request->all()['total_ht'];
        $table_devi->total_ttc     = $request->all()['total_ttc'];
        $table_devi->date_creation = $request->all()['date_creation'];
        if(isset($request->all()['date_envoie'])){
          $table_devi->date_envoie   = $request->all()['date_envoie'];
        }
        $table_devi->entreprise_id = $entreprise_id->id;
        $table_devi->client_id     = $client->client_id;
        $table_devi->etat_devi_id  = 1;
        $table_devi->tva           = $request->all()['total_ttc']-$request->all()['total_ht'];
        $table_devi->save();

        return view('test', ['test' =>  $table_devi, 'imputs' => '$a', 'comp' => '$table'.' ']);
        $data=chantier::with('client','etat_chantier')->where('entreprise_id',$entreprise->id)->get();

        return view($this->chemin.$table.'_datatables',[
            'titre'        => $entreprise['nom'].' - Tableau Chantier',
            'descriptif'   => 'Liste des chantiers appartenant à l\'entreprise '.$entreprise['nom_display'].'.',
            'data'         => $data,
            // 'type_clients' => $type_clients,
            // 'entreprises'  => $entreprises,
            'colonne_order' => 0,
            'ordre'         => "desc",
        ]);


      }


      return view('test', ['test' =>  $choix_entrepise, 'imputs' => '$table', 'comp' => $request->except(['_token'])]);

    }

}
