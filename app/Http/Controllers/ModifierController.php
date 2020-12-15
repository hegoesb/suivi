<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\FormulaireRepository;

use App\Models\entreprise;
use App\Models\facture;

class ModifierController extends Controller
{

    public function __construct(FormulaireRepository $FormulaireRepository)
    {
        $this->chemin_modifier      = 'pages.modifier.';
        $this->formulaireRepository = $FormulaireRepository;
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
          return view('test', ['test' =>  $facture, 'imputs' => '$a', 'comp' => '$table']);

          //Selection des devis chantiers et la liaison devi_facture existante
          $data = $this->formulaireRepository->select_devi_chantierFacture($facture);

          return view('test', ['test' =>  $data, 'imputs' => '$a', 'comp' => '$table']);


      }


    }
}
