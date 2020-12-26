<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\FormulaireRepository;
use App\Repositories\QueryTableRepository;
use App\Repositories\TraitementRepository;

use App\Models\client;
use App\Models\chantier;
use App\Models\devi;
use App\Models\entreprise;
use App\Models\facture;
use App\Models\facture_paiement;
use App\Models\paiement;

class ModifierController extends Controller
{

    public function __construct(FormulaireRepository $FormulaireRepository,QueryTableRepository $QueryTableRepository, TraitementRepository $TraitementRepository)
    {
        $this->chemin_modifier      = 'pages.modifier.';
        $this->formulaireRepository = $FormulaireRepository;
        $this->QueryTableRepository = $QueryTableRepository;
        $this->TraitementRepository = $TraitementRepository;
    }

    //-------------------------
    // View
    //-------------------------

    public function viewModifier($entreprise_id,$table,$id)
    {

      //Selection nom de l'entreprise pour le titre de la page
      $entreprise=entreprise::where('id',$entreprise_id)->first();

      if($table=='devi_facture'){
        $facture = facture::with('chantier','devi')->where('id',$id)->first();
        // return view('test', ['test' =>  $facture, 'imputs' => '$a', 'comp' => '$table']);

        //Selection des devis chantiers et la liaison devi_facture existante
        $data = $this->formulaireRepository->select_devi_chantierFacture($facture);

        // return view('test', ['test' =>  $data, 'imputs' => '$a', 'comp' => '$table']);

        return view($this->chemin_modifier.$table.'_modif2',[
            'titre'      => $entreprise['nom'].' - Associer une facture aux devis - [Facture : '.$facture['numero'].']',
            'descriptif1' => "Associer la facture",
            'descriptif2' => $facture['numero'],
            'descriptif3' => " aux devis ci-dessous. (Certains devis peuvent déjà être rattachés).",
            'facture'    => $facture,
            'entreprise' => $entreprise,
            'data' =>$data,
        ]);
      }elseif($table=='facture_paiement'){
        $paiement = paiement::with('client')->where('id',$id)->first();
        $factures= facture::where('client_id',$paiement->client_id)->get();
        // return view('test', ['test' => $paiement, 'imputs' => '$a', 'comp' => '$table']);

        //Selection des devis clients et la liaison devi_facture existante
        $data = $this->formulaireRepository->select_facture_clientPaiement($factures);

        // return view('test', ['test' =>  $data, 'imputs' => '$a', 'comp' => '$table']);

        return view($this->chemin_modifier.$table.'_modif2',[
            'titre'      => $entreprise['nom'].' - Associer un paiement aux factures - [Paiement : '.$paiement['numero_releve_compte'].'-'.$paiement['client']['nom'].'-'.$paiement['valeur_ttc'].'€]',
            'descriptif1' => "Associer le paiement",
            'descriptif2' => $paiement['numero_releve_compte'].'-'.$paiement['client']['nom'].'-'.$paiement['valeur_ttc'].'€',
            'descriptif3' => " aux factures ci-dessous. (Certaines factures peuvent déjà être rattachées).",
            'paiement'    => $paiement,
            'entreprise' => $entreprise,
            'data' =>$data,
        ]);
      }elseif($table=='clients'){

          //Selection de données nécessaire au formulaire
          $type_client              = $this->formulaireRepository->select_type_clients();
          $client                   = client::with('entreprise', 'type_client')->where('id',$id)->first();
          $choix_entreprise_checked = $this->formulaireRepository->select_entreprises_checked($client);
          $lien                     = '/tableau/'.$entreprise_id.'/'.$table;

          // return view('test', ['test' =>  $choix_entreprise_checked, 'imputs' => $client['entreprise'][0], 'comp' => '$table'.' ']);

          return view($this->chemin_modifier.$table.'_modif2',[
              'titre'            => $entreprise['nom'].' - Modifier un client',
              'descriptif'       => 'Le client sera modifié à la table client commune aux deux entreprises. Un client peut appartenir aux deux entreprises',
              'client'           => $client,
              'lien'             => $lien,
              'type_client'      => $type_client,
              'choix_entreprise' => $choix_entreprise_checked,
              'entreprise_id'    => $entreprise->id,
          ]);
      }elseif($table=='chantiers'){

          //Selection de données nécessaire au formulaire
          $client   = $this->formulaireRepository->select_clients($entreprise);
          $chantier = chantier::with('entreprise', 'etat_chantier')->where('id',$id)->first();




          $type_client              = $this->formulaireRepository->select_type_clients();
          // $client                   = client::with('entreprise', 'type_client')->where('id',$id)->first();
          $choix_client_checked = $this->formulaireRepository->select_clients_checked($entreprise_id,$chantier);
          $lien                     = '/tableau/'.$entreprise_id.'/'.$table;

          // return view('test', ['test' =>  $choix_client_checked, 'imputs' => '', 'comp' => '$table'.' ']);

          return view($this->chemin_modifier.$table.'_modif2',[
              'titre'        => $entreprise['nom'].' - Modifier un chantier',
              'descriptif'   => 'Le chantier sera associé à l\'entreprise '.$entreprise['nom_display'].'.',
              'clients'      => $client,
              'chantier'     => $chantier,
              'entreprise'   => $entreprise,
              'lien'         => $lien,
              'type_client'  => $type_client,
              'choix_client' => $choix_client_checked,
          ]);


          //Selection de données nécessaire au formulaire
          $client = $this->formulaireRepository->select_clients($entreprise);

          // return view('test', ['test' =>  $client, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_select2',[
              'titre'      => $entreprise['nom'].' - Ajouter un chantier',
              'descriptif' => 'Le chantier sera associé à l\'entreprise '.$entreprise['nom_display'].'.',
              'clients'    => $client,
              'entreprise' => $entreprise,
          ]);




      }





        abort(404);

    }

    //-------------------------
    // Post
    //-------------------------

    public function postModifier($entreprise_id,$table,$id, Request $request)
    {

      $entreprises=entreprise::get();


      if($table=='devi_facture'){
        //Supprimer les liaisons devis factures
        $supprimer = $this->QueryTableRepository->delete_devi_factureId($id);
        //Sauvergarde des nouvelles les liaisons devis factures
        if(!empty($request->except(['_token']))){

          $ajouter = $this->QueryTableRepository->save_devi_facture($request->except(['_token']),$id);
        }

        // return view('test', ['test' =>  $ajouter , 'imputs' => '$a', 'comp' => $request->except(['_token'])]);
        return redirect('/tableau/'.$entreprise_id.'/factures');

      }elseif($table=='facture_paiement'){
        //Supprimer les liaisons factures paiements
        $supprimer = $this->QueryTableRepository->delete_facture_paiementId($id);
        //Sauvergarde des nouvelles les liaisons factures paiements
        if(!empty($request->except(['_token']))){
          $ajouter = $this->QueryTableRepository->save_facture_paiement($request->except(['_token']),$id);
        }

        // return view('test', ['test' =>  $ajouter , 'imputs' => '$a', 'comp' => $request->except(['_token'])]);
        return redirect('/tableau/'.$entreprise_id.'/paiements');

      }elseif($table=='clients'){

        //Verifier si au moins une entreprise à été selectionner et Préparation de la nouvelle liaison client entreprise
        $liaison_entrepise=$this->TraitementRepository->entreprise_for_client($request->except(['_token']),$id);

        if($liaison_entrepise != false){
          //Suppression de la liaison entreprise existante
          $supprimer = $this->QueryTableRepository->delete_entreprise_clientId($id);
          //Update du client
          $update_client = $this->QueryTableRepository->update_clientId($request->except(['_token']),$id,$entreprises);
          //Ajout de la nouvelle liaison entreprise client
          $save_liaison = $this->QueryTableRepository->save_client_entreprise($liaison_entrepise);

          return redirect('/tableau/'.$entreprise_id.'/clients');
          // return view('test', ['test' =>  $update_client , 'imputs' => '$a', 'comp' => $request->except(['_token'])]);
        }else{
          return redirect('/modifier/'.$entreprise_id.'/clients/'.$id);
        }

      }
        abort(404);

    }
}
