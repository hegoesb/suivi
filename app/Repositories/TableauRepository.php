<?php namespace App\Repositories;

use App\Models\chantier;
use App\Models\client;
use App\Models\devi;

class TableauRepository {

	protected $parametre;

	public function __construct()
	{

	}

	public function selection_clients()
	{

        $data = client::with('entreprise','type_client')->get();

        return $data;
	}

  //-------------------------
  // Chantier
  //-------------------------

  public function chantier_table($entreprise)
  {

    $chantiers=chantier::with('client','etat_chantier')->where('entreprise_id',$entreprise->id)->get();

    foreach ($chantiers as $key => $chantier) {
      $data[$key]['id']                    = $chantier->id;
      $data[$key]['identifiant']           = $chantier->identifiant;
      $data[$key]['nom']                   = $chantier->nom;
      $data[$key]['libelle']               = $chantier->libelle;
      $data[$key]['client']['nom']         = $chantier['client']['nom'];
      $data[$key]['client']['nom_display'] = $chantier['client']['nom_display'];
      $data[$key]['date_debut']            = $chantier->date_debut;
      $devi = devi::where('entreprise_id',$entreprise->id)->where('chantier_id',$chantier->id)->first();
      if(!isset($devi)){
        $data[$key]['supprimer']='/supprimer/'.$entreprise->id.'/chantiers/'.$chantier->id;
      }else{
        $data[$key]['supprimer']=null;
      }
    }

    return $data;
  }
}
