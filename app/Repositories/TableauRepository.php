<?php namespace App\Repositories;

use App\Models\chantier;
use App\Models\client;
use App\Models\devi;
use App\Models\devi_facture;
use App\Models\facture;
use App\Models\facture_reglement;
use App\Models\reglement;

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

    if(!isset($chantiers)){
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
    }else{
      $data=null;
    }
    return $data;
  }

  //-------------------------
  // Devis
  //-------------------------

  public function devi_table($entreprise)
  {

    $devis=devi::with('etat_devi','type_devi','client','chantier','collaborateur')->where('entreprise_id',$entreprise->id)->get();
    if(!isset($devis)){
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
    }else{
      $data=null;
    }
    return $data;
  }

  //-------------------------
  // Facture
  //-------------------------

  public function facture_table($entreprise)
  {

    $factures=facture::with('devi','type_facture','client','chantier','collaborateur')->where('entreprise_id',$entreprise->id)->get();

    if(!isset($factures)){
      foreach ($factures as $key => $facture) {
        $data[$key]['id']                           = $facture->id;
        $data[$key]['numero']                       = $facture->numero;
        $data[$key]['chantier']['identifiant']      = $facture['chantier']->identifiant;
        $data[$key]['chantier']['nom']              = $facture['chantier']->nom;
        $data[$key]['collaborateur']['nom_display'] = $facture['collaborateur']->nom_display;
        $data[$key]['collaborateur']['nom']         = $facture['collaborateur']->nom;
        $data[$key]['client']['nom']                = $facture['client']->nom;
        $data[$key]['client']['nom_display']        = $facture['client']->nom_display;
        $data[$key]['type_facture']['nom']          = $facture['type_facture']['nom'];
        $data[$key]['type_facture']['nom_display']  = $facture['type_facture']['nom_display'];
        $data[$key]['devi']                         = $facture['devi'];
        $data[$key]['date_creation']                = $facture->date_creation;
        $data[$key]['date_echeance']                = $facture->date_echeance;
        $data[$key]['date_envoie']                  = $facture->date_envoie;
        $data[$key]['total_ht']                     = $facture->total_ht;
        $data[$key]['total_ttc']                    = $facture->total_ttc;
        $data[$key]['tva']                          = $facture->tva;
        $data[$key]['retenuegarantie_ht']           = $facture->retenuegarantie_ht;

        $reglement = facture_reglement::where('facture_id',$facture->id)->first();
        if(!isset($reglement)){
          $data[$key]['supprimer']='/supprimer/'.$entreprise->id.'/factures/'.$facture->id;
        }else{
          $data[$key]['supprimer']=null;
        }
      }
    }else{
      $data=null;
    }
    return $data;
  }

  //-------------------------
  // Reglement
  //-------------------------

  public function reglement_table($entreprise)
  {

    $reglements=reglement::with('devi','type_facture','client','chantier','collaborateur')->where('entreprise_id',$entreprise->id)->get();

    if(!isset($reglements)){
      foreach ($reglements as $key => $reglement) {
        $data[$key]['id']                            = $reglement->id;
        $data[$key]['numero']                        = $reglement->numero;
        $data[$key]['chantier']['identifiant']       = $reglement['chantier']->identifiant;
        $data[$key]['chantier']['nom']               = $reglement['chantier']->nom;
        $data[$key]['collaborateur']['nom_display']  = $reglement['collaborateur']->nom_display;
        $data[$key]['collaborateur']['nom']          = $reglement['collaborateur']->nom;
        $data[$key]['client']['nom']                 = $reglement['client']->nom;
        $data[$key]['client']['nom_display']         = $reglement['client']->nom_display;
        $data[$key]['type_reglement']['nom']         = $reglement['type_reglement']['nom'];
        $data[$key]['type_reglement']['nom_display'] = $reglement['type_reglement']['nom_display'];
        $data[$key]['etat_devi']['nom']              = $reglement['etat_devi']['nom'];
        $data[$key]['etat_devi']['nom_display']      = $reglement['etat_devi']['nom_display'];
        $data[$key]['envoie']                        = $reglement->IfNull['envoie'];
        $data[$key]['signature']                     = $reglement->IfNull['signature'];
        $data[$key]['progbox']                       = $reglement->IfNull['progbox'];
        $data[$key]['total_ht']                      = $reglement->total_ht;
        $data[$key]['total_ttc']                     = $reglement->total_ttc;
        $data[$key]['tva']                           = $reglement->tva;

        $facture = reglement_facture::where('reglement_id',$reglement->id)->first();
        if(!isset($facture)){
          $data[$key]['supprimer']='/supprimer/'.$entreprise->id.'/reglements/'.$reglement->id;
        }else{
          $data[$key]['supprimer']=null;
        }
      }
    }else{
      $data=null;
    }
    return $data;
  }

}
