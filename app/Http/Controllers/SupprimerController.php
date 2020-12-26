<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\chantier;
use App\Models\devi;
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

        $verif = devi::where('entreprise_id',$entreprise->id)->where('chantier_id',$id)->first();
        if(!isset($verif)){
          $chantier_deleted = chantier::where('entreprise_id',$entreprise->id)->where('id',$id)->first();
          if(isset($chantier_deleted)){
            $chantier_deleted->delete();
          }
        }
        return redirect('/tableau/'.$entreprise->id.'/chantiers');

      }
    }
}
