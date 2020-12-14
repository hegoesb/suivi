<?php namespace App\Repositories;

use App\Models\chantier;
use App\Models\client;
use App\Models\collaborateur;
use App\Models\entreprise;
use App\Models\type_client;
use App\Models\type_devi;
use App\Models\type_facture;

class FormulaireRepository {

	protected $parametre;

	public function __construct()
	{

	}
  //-------------------------
  // Entreprise
  //-------------------------

  public function select_entreprises()
  {
    $datas=entreprise::get();
    foreach ($datas as $key_2 => $value) {
      $data[$key_2][0]=$value['id'];
      $data[$key_2][1]=$value['nom_display'];
    }
    return $data;
  }

  //-------------------------
  // Client
  //-------------------------

  public function select_type_clients()
  {
    $datas=type_client::get();
    foreach ($datas as $key_1 => $value) {
      $data[$key_1][0]=$value['id'];
      $data[$key_1][1]=$value['nom_display'];
    }
    return $data;
  }

  public function select_clients($entreprise)
  {
    $datas=entreprise::with('client')->where('id',$entreprise->id)->first();
    foreach ($datas['client'] as $key_2 => $value) {
      $data[$key_2][0]=$value['id'];
      $data[$key_2][1]=$value['nom_display'];
    }
    return $data;
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