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


  //-------------------------
  // Tri Version plan
  //-------------------------

  public function triVersionPlan($liste_plans)
  {
    foreach ($liste_plans as $key_lp => $lp) {//Bloucle liste plan
      $explode_nom_plan        = explode("_", $lp);
      $explode_version         = str_split($explode_nom_plan[3]);
      $explode_nom_plan['diffusion'] = array_shift($explode_version);
      $version_travail         = array_shift($explode_version);
      if(empty($explode_version)){
        $explode_nom_plan['travail'] = 0;

      }else{
        $explode_nom_plan['travail'] = implode($explode_version);

      }
      $array[$key_lp] = $explode_nom_plan;
    }

      //Tri par version
      $diffusion = array_column($array, 'diffusion');
      $travail   = array_column($array, 'travail');
      array_multisort($diffusion, SORT_DESC, $travail, SORT_ASC, $array);

      foreach ($array as $key_a => $a) {
        if($array[0]['travail']==0){
          if($key_a==0){
            $array[$key_a]['deplacer']=false;
          }else{
            $array[$key_a]['deplacer']=true;
          }
        }else{
          if($array[0]['diffusion']==$a['diffusion']){
            $array[$key_a]['deplacer']=false;
          }else{
            $array[$key_a]['deplacer']=true;
          }
        }
      }

    return $array;
  }



}


