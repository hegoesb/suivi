<?php namespace App\Repositories;

use App\Models\entreprise;


class TraitementRepository {

	protected $parametre;

	public function __construct()
	{

	}
  //-------------------------
  // Entreprise
  //-------------------------

  public function entreprise_for_client($request,$client_id)
  {

    $entreprises=entreprise::get();
    $data = false;

    foreach ($entreprises as $key_entreprise => $entreprise) {
      foreach ($request as $key_resquest => $value) {
        if('entreprise_'.$entreprise->id==$key_resquest){
          $data[$key_entreprise][0]=$entreprise->id;
          $data[$key_entreprise][1]=$client_id;
        }
      }
    }
    return $data;
  }

}
