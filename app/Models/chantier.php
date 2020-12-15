<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class chantier extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $table = 'chantiers';

  public function entreprise()
  {
      return $this->belongsTo('App\Models\entreprise');
  }
  public function client()
  {
      return $this->belongsTo('App\Models\client');
  }
  public function etat_chantier()
  {
      return $this->belongsTo('App\Models\etat_chantier');
  }
  public function getNomChantierAttribute(){
    $identifiant = $this->identifiant;
    $data = str_split($identifiant,15);
    if(isset($data[1])){
      $data[1] = substr($data[1],3);
    }
    return $data;
  }


}
