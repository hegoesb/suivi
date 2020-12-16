<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\FormulaireRepository;
use App\Repositories\QueryTableRepository;

use App\Models\entreprise;
use App\Models\facture;

class ModifierController extends Controller
{

    public function __construct(FormulaireRepository $FormulaireRepository,QueryTableRepository $QueryTableRepository)
    {
        $this->chemin_modifier      = 'pages.modifier.';
        $this->formulaireRepository = $FormulaireRepository;
        $this->QueryTableRepository = $QueryTableRepository;
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

          return view($this->chemin_modifier.$table.'_select2',[
              'titre'      => $entreprise['nom'].' - Associer une facture aux devis - [Facture : '.$facture['numero'].']',
              'descriptif1' => "Associer la facture",
              'descriptif2' => $facture['numero'],
              'descriptif3' => " au devis ci-dessous. (Certains devis peuvent dèjà être rattachés).",
              'facture'    => $facture,
              'entreprise' => $entreprise,
              'data' =>$data,
          ]);
      }
        abort(404);

    }

    //-------------------------
    // Post
    //-------------------------

    public function postModifier($entreprise_id,$table,$id, Request $request)
    {

      if($table=='devi_facture'){
        //Supprimer les liaisons devis factures
        $supprimer = $this->QueryTableRepository->delete_devi_factureId($id);
        //Sauvergarde des nouvelles les liaisons devis factures
        if(!empty($request->except(['_token']))){

          $ajouter = $this->QueryTableRepository->save_devi_facture($request->except(['_token']),$id);
        }

        // return view('test', ['test' =>  $ajouter , 'imputs' => '$a', 'comp' => $request->except(['_token'])]);
        return redirect('/tableau/'.$entreprise_id.'/factures');

      }
        abort(404);

    }
}
