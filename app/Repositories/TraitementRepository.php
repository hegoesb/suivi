<?php namespace App\Repositories;

use App\Models\chantier;
use App\Models\entreprise;
use Carbon\Carbon;

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

  //-------------------------
  // Chantier
  //-------------------------

  public function new_identifiant_chantier($entreprise)
  {
    $date = Carbon::now();
    $chantier = chantier::where('entreprise_id',$entreprise->id)->orderBy('identifiant', 'desc')->first();

    if(isset($chantier)){
      $numero_chantier = str_split($chantier->identifiant,11)[1]+1;
      $array_numero = str_split($numero_chantier,1);
      $i=0;
      foreach ($array_numero as $key => $value) {
        $i++;
      }
      if($i==3){
        $numero = '000'.$numero_chantier;
      }elseif($i==2){
        $numero = '00'.$numero_chantier;
      }elseif($i==1){
        $numero = '0'.$numero_chantier;
      }
      // $numero = str_split($last_numero_chantier,1);
      $identifiant = $entreprise->prefixe_chantier.$date->format('ym').'-'.$numero;
    }else{
      $identifiant = $entreprise->prefixe_chantier.$date->format('ym').'-0001';
    }

    return $identifiant;
  }


}


