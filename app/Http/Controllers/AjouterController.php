<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\TableauRepository;
use App\Repositories\FormulaireRepository;
use App\Repositories\QueryTableRepository;
use App\Repositories\TraitementRepository;

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
    public function __construct(TableauRepository $TableauRepository, FormulaireRepository $FormulaireRepository, QueryTableRepository $QueryTableRepository, TraitementRepository $TraitementRepository)
    {
        $this->chemin               = 'pages.ajouter.';
        $this->chemin_tableau       = 'pages.tableaux.';
        $this->chemin_modifier      = 'pages.modifier.';
        $this->tableauRepository    = $TableauRepository;
        $this->formulaireRepository = $FormulaireRepository;
        $this->QueryTableRepository = $QueryTableRepository;
        $this->TraitementRepository = $TraitementRepository;
    }

  //-------------------------
  // View
  //-------------------------


    public function viewAjouter($entreprise_id,$table)
    {
        //Selection nom de l'entreprise pour le titre de la page
        $entreprise=entreprise::where('id',$entreprise_id)->first();

        if($table=='clients'){

          //Selection de données nécessaire au formulaire
          $type_client = $this->formulaireRepository->select_type_clients();
          $choix_entreprise = $this->formulaireRepository->select_entreprises();


          // return view('test', ['test' =>  $choix_entreprise, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_select2',[
              'titre'            => $entreprise['nom'].' - Ajouter un client',
              'descriptif'       => 'Le client sera ajouté à la table client commune aux deux entreprises. Un client peut appartenir aux deux entreprises',
              'type_client'      => $type_client,
              'choix_entreprise' => $choix_entreprise,
              'entreprise_id'    => $entreprise->id,
          ]);
        }elseif ($table=='chantiers') {

          //Selection de données nécessaire au formulaire
          $identifiant   = $this->TraitementRepository->new_identifiant_chantier($entreprise);
          $client = $this->formulaireRepository->select_clients($entreprise);

          // return view('test', ['test' =>  $identifiant, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_select2',[
              'titre'       => $entreprise['nom'].' - Ajouter un chantier',
              'descriptif'  => 'Le chantier sera associé à l\'entreprise '.$entreprise['nom_display'].'.',
              'clients'     => $client,
              'identifiant' => $identifiant,
              'entreprise'  => $entreprise,
          ]);

          // return view('test', ['test' =>  $choix_entreprise, 'imputs' => '$a', 'comp' => '$table'.' ']);

        }elseif ($table=='devis') {

          //Selection de données nécessaire au formulaire
          $chantier      = $this->formulaireRepository->select_chantiers($entreprise);
          $type_devi     = $this->formulaireRepository->select_type_devis();
          $collaborateur = $this->formulaireRepository->select_collaborateurs();
          $client        = $this->formulaireRepository->select_clients($entreprise);


          return view($this->chemin.$table.'_select2',[
              'titre'          => $entreprise['nom'].' - Ajouter un devis',
              'descriptif'     => 'Le devis sera associé à l\'entreprise '.$entreprise['nom_display'].'.',
              'chantiers'      => $chantier,
              'type_devis'     => $type_devi,
              'collaborateurs' => $collaborateur,
              'entreprise'     => $entreprise,
              'clients'        => $client,
          ]);

          // return view('test', ['test' =>  $choix_entreprise, 'imputs' => '$a', 'comp' => '$table'.' ']);

        }elseif ($table=='factures') {

          //Selection de données nécessaire au formulaire
          $chantier      = $this->formulaireRepository->select_chantiers($entreprise);
          $type_facture  = $this->formulaireRepository->select_type_factures();
          $collaborateur = $this->formulaireRepository->select_collaborateurs();

          // return view('test', ['test' =>  $type_devi, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_select2',[
              'titre'          => $entreprise['nom'].'- Ajouter une facture',
              'descriptif'     => 'La factures sera associée à l\'entreprise '.$entreprise['nom_display'].'.',
              'chantiers'      => $chantier,
              'type_factures'  => $type_facture,
              'collaborateurs' => $collaborateur,
              'entreprise'     => $entreprise,
          ]);

          // return view('test', ['test' =>  $choix_entreprise, 'imputs' => '$a', 'comp' => '$table'.' ']);

        }elseif ($table=='paiements') {

          //Selection de données nécessaire au formulaire
          $client         = $this->formulaireRepository->select_clients($entreprise);
          $type_paiement = $this->formulaireRepository->select_type_paiements();

          // return view('test', ['test' =>  $type_devi, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_select2',[
              'titre'          => $entreprise['nom'].'- Ajouter un paiement',
              'descriptif'     => 'Le paiement sera associé à l\'entreprise '.$entreprise['nom_display'].'.',
              'clients'        => $client,
              'type_paiements' => $type_paiement,
              'entreprise'     => $entreprise,
          ]);

          // return view('test', ['test' =>  $choix_entreprise, 'imputs' => '$a', 'comp' => '$table'.' ']);

        }
        abort(404);

    }




  //-------------------------
  // Post
  //-------------------------


    public function postAjouter($entreprise_id, $table, Request $request)
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
        $choix_entrepise=$this->TraitementRepository->entreprise_for_client($request->except(['_token']),$table_client->id);
        $save_liaison = $this->QueryTableRepository->save_client_entreprise($choix_entrepise);


        $type_clients=type_client::get();
        $data=$this->tableauRepository->selection_clients();

        return view($this->chemin_tableau.$table.'_datatables',[
            'titre'         => $entreprise_id['nom'].' - Tableau Client',
            'descriptif'    => 'Liste des clients appartenant aux deux entreprises',
            'data'          => $data,
            'type_clients'  => $type_clients,
            'entreprises'   => $entreprises,
            'entreprise'    => $entreprise_id,
            'table'         => $table,
            'colonne_order' => 0,
            'ordre'         => 'desc',
        ]);

      }elseif($table=='chantiers'){

        $this->validate($request, [
            'nom'         => 'required|max:15',
            'libelle'     => 'required|max:50',
            'client_id'   => 'required',
            'date_debut'  => 'required',
        ]);
        $identifiant   = $this->TraitementRepository->new_identifiant_chantier($entreprise_id);

        //Sauvergarde du nouveau chantier
        $table_chantier = new chantier;
        $table_chantier->identifiant      = $identifiant;
        $table_chantier->nom              = $request->all()['nom'];
        $table_chantier->libelle          = $request->all()['libelle'];
        $table_chantier->client_id        = $request->all()['client_id'];
        $table_chantier->entreprise_id    = $entreprise_id->id;
        $table_chantier->date_debut       = $request->all()['date_debut'];
        $table_chantier->etat_chantier_id = 1;
        $table_chantier->save();
        // return view('test', ['test' => '', 'imputs' => '$a', 'comp' => $request->except(['_token'])]);

        $data=$this->tableauRepository->chantier_table($entreprise_id);

        return view($this->chemin_tableau.$table.'_datatables',[
            'titre'        => $entreprise_id['nom'].' - Tableau Chantier',
            'descriptif'   => 'Liste des chantiers appartenant à l\'entreprise '.$entreprise_id['nom_display'].'.',
            'data'         => $data,
            'entreprise'    => $entreprise_id,
            'table'         => $table,
            'colonne_order' => 0,
            'ordre'         => "desc",
        ]);


      }elseif($table=='devis'){

        $this->validate($request, [
            'numero'           => 'required|min:15|max:15|unique:devis',
            'lot'              => 'required|max:50',
            'chantier_id'      => 'required',
            'client_id'        => 'required',
            'type_devi_id'     => 'required',
            'collaborateur_id' => 'required',
            'total_ht'         => 'required',
            'total_ttc'        => 'required',
            'date_creation'    => 'required',
        ]);

        //Sauvergarde du nouveau devis
        $table_devi = new devi;
        $table_devi->numero           = $request->all()['numero'];
        $table_devi->lot              = $request->all()['lot'];
        $table_devi->chantier_id      = $request->all()['chantier_id'];
        $table_devi->client_id        = $request->all()['client_id'];
        $table_devi->type_devi_id     = $request->all()['type_devi_id'];
        $table_devi->collaborateur_id = $request->all()['collaborateur_id'];
        $table_devi->total_ht         = $request->all()['total_ht'];
        $table_devi->total_ttc        = $request->all()['total_ttc'];
        $table_devi->date_creation    = $request->all()['date_creation'];
        if(isset($request->all()['date_envoie'])){
          $table_devi->date_envoie   = $request->all()['date_envoie'];
        }
        $table_devi->entreprise_id = $entreprise_id->id;
        $table_devi->etat_devi_id  = 1;
        $table_devi->tva           = $request->all()['total_ttc']-$request->all()['total_ht'];
        $table_devi->save();

        // return view('test', ['test' =>  $table_devi, 'imputs' => '$a', 'comp' => '$table'.' ']);
        $data=devi::with('etat_devi','type_devi','client','chantier','collaborateur')->where('entreprise_id',$entreprise_id->id)->get();
        // return view('test', ['test' =>  $data, 'imputs' => '$a', 'comp' => '$table'.' ']);

        return view($this->chemin_tableau.$table.'_datatables',[
            'titre'        => $entreprise_id['nom'].' - Tableau Devis',
            'descriptif'   => 'Liste des devis appartenant à l\'entreprise '.$entreprise_id['nom_display'].'.',
            'data'         => $data,
            'colonne_order' => 0,
            'ordre'         => "desc",
        ]);


      }elseif($table=='factures'){

        $this->validate($request, [
            'numero'           => 'required|min:15|max:15|unique:factures',
            'chantier_id'      => 'required',
            'type_facture_id'  => 'required',
            'collaborateur_id' => 'required',
            'total_ht'         => 'required',
            'total_ttc'        => 'required',
            'date_creation'    => 'required',
            'date_echeance'    => 'required',
        ]);

        //Sauvergarde du nouveau devis
        $table = $this->QueryTableRepository->save_facture_ajouter($request,$entreprise_id);
        // return view('test', ['test' =>  $table, 'imputs' => '$a', 'comp' => '$table'.' ']);

        //rapprochement devis -> facture
        return redirect('/modifier/'.$entreprise_id->id.'/devi_facture/'.$table->id);

      }elseif($table=='paiements'){

        $this->validate($request, [
            'numero_releve_compte' => 'required|max:4',
            'valeur_ttc'           => 'required',
            'type_paiement_id'     => 'required',
            'client_id'            => 'required',
            'date_paye'            => 'required',
        ]);
        // return view('test', ['test' =>  '$data', 'imputs' => '$a', 'comp' => $request->except(['_token'])]);

        //Sauvergarde du nouveau paiement
        $table = $this->QueryTableRepository->save_paiement_ajouter($request,$entreprise_id);
        // return view('test', ['test' =>  $table, 'imputs' => '$a', 'comp' => '$table'.' ']);

        //Rapprochement facture -> paiement
        return redirect('/modifier/'.$entreprise_id->id.'/facture_paiement/'.$table->id);

      }

        abort(404);

      return view('test', ['test' =>  $choix_entrepise, 'imputs' => '$table', 'comp' => $request->except(['_token'])]);

    }

}
