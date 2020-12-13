<?php namespace App\Repositories;

use App\Models\chantier;
use App\Models\type_facture;
use App\Models\collaborateur;

class FormulaireRepository {

	protected $parametre;

	public function __construct()
	{

	}

  //-------------------------
  // Chantier
  //-------------------------

	public function select_chantiers($entreprise)
	{
    $datas=chantier::with('client')->where('entreprise_id',$entreprise->id)->orderBy('identifiant','desc')->get();
    foreach ($datas as $key => $value) {
      $data[$key][0]=$value['id'];
      $data[$key][1]=$value['identifiant'];
    }
    return $data;
	}

  //-------------------------
  // Devis
  //-------------------------

  public function select_type_devis()
  {
    $datas=type_devi::get();
    foreach ($datas as $key => $value) {
      $data[$key][0]=$value['id'];
      $data[$key][1]=$value['nom_display'];
    }
    return $data;
  }

  //-------------------------
  // Facture
  //-------------------------

  public function select_type_factures()
  {
    $datas=type_facture::get();
    foreach ($datas as $key => $value) {
      $data[$key][0]=$value['id'];
      $data[$key][1]=$value['nom_display'];
    }
    return $data;
  }

  //-------------------------
  // Collaborateur
  //-------------------------

  public function select_collaborateurs()
  {
    $datas=collaborateur::orderBy('nom','asc')->get();
    foreach ($datas as $key_2 => $value) {
      $data[$key_2][0]=$value['id'];
      $data[$key_2][1]=$value['nom_display'];
    }
    return $data;
  }










}
