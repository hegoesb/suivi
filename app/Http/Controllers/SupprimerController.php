<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\chantier;
use App\Models\devi;
use App\Models\devi_facture;
use App\Models\entreprise;

class SupprimerController extends Controller
{

    public function __construct()
    {
        $this->chemin_supprimer      = 'pages.supprimer.';
    }


    //-------------------------
    // View
    //-------------------------

    public function viewSupprimer($entreprise_id,$table,$id)
    {
      //Selection nom de l'entreprise pour le titre de la page
      $entreprise=entreprise::where('id',$entreprise_id)->first();

      if($table=='chantiers'){
        //Vérification qu'aucun devis n'exsite pour le chantier, sinon on supprime pas.
        $verif = devi::where('entreprise_id',$entreprise->id)->where('chantier_id',$id)->first();
        if(!isset($verif)){
          $chantier_deleted = chantier::where('entreprise_id',$entreprise->id)->where('id',$id)->first();
          if(isset($chantier_deleted)){
            $chantier_deleted->delete();
          }
        }
        return redirect('/tableau/'.$entreprise->id.'/chantiers');

      }
      if($table=='devis'){

        //Vérification qu'aucune facture n'exsite pour le devis, sinon on supprime pas.
        $verif = devi_facture::where('devi_id',$id)->first();
        if(!isset($verif)){
          $devi_deleted = devi::where('entreprise_id',$entreprise->id)->where('id',$id)->first();
          if(isset($devi_deleted)){
            $devi_deleted->delete();
          }
        }
        return redirect('/tableau/'.$entreprise->id.'/devis');

      }

    }
}
