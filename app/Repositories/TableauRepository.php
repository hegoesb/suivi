<?php namespace App\Repositories;

use App\Models\chantier;
use App\Models\client;
use App\Models\devi;
use App\Models\devi_facture;

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

  //-------------------------
  // Chantier
  //-------------------------

  public function devi_table($entreprise)
  {

    $devis=devi::with('etat_devi','type_devi','client','chantier','collaborateur')->where('entreprise_id',$entreprise->id)->get();

    foreach ($devis as $key => $devi) {
      $data[$key]['id']                       = $devi->id;
      $data[$key]['lot']                      = $devi->lot;
      $data[$key]['numero']                   = $devi->numero;
      $data[$key]['chantier']['identifiant']  = $devi['chantier']->identifiant;
      $data[$key]['chantier']['nom']          = $devi['chantier']->nom;
      $data[$key]['collaborateur']['nom_display']  = $devi['collaborateur']->nom_display;
      $data[$key]['collaborateur']['nom']          = $devi['collaborateur']->nom;
      $data[$key]['client']['nom']            = $devi['client']->nom;
      $data[$key]['client']['nom_display']    = $devi['client']->nom_display;
      $data[$key]['type_devi']['nom']         = $devi['type_devi']['nom'];
      $data[$key]['type_devi']['nom_display'] = $devi['type_devi']['nom_display'];
      $data[$key]['etat_devi']['nom']         = $devi['etat_devi']['nom'];
      $data[$key]['etat_devi']['nom_display'] = $devi['etat_devi']['nom_display'];
      $data[$key]['envoie']                   = $devi->IfNull['envoie'];
      $data[$key]['signature']                = $devi->IfNull['signature'];
      $data[$key]['progbox']                  = $devi->IfNull['progbox'];
      $data[$key]['total_ht']                 = $devi->total_ht;
      $data[$key]['total_ttc']                = $devi->total_ttc;
      $data[$key]['tva']                      = $devi->tva;

      $facture = devi_facture::where('devi_id',$devi->id)->first();
      if(!isset($facture)){
        $data[$key]['supprimer']='/supprimer/'.$entreprise->id.'/devis/'.$devi->id;
      }else{
        $data[$key]['supprimer']=null;
      }
    }

    return $data;
  }


}
