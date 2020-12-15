<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class devi extends Model
{
    use HasFactory;
  use SoftDeletes;

  public function type_devi()
  {
      return $this->belongsTo('App\Models\type_devi');
  }
  public function etat_devi()
  {
      return $this->belongsTo('App\Models\etat_devi');
  }
  public function chantier()
  {
      return $this->belongsTo('App\Models\chantier');
  }
  public function client()
  {
      return $this->belongsTo('App\Models\client');
  }
  public function collaborateur()
  {
      return $this->belongsTo('App\Models\collaborateur');
  }
  public function facture()
  {
      return $this->belongsToMany('App\Models\facture', 'devi_facture', 'devi_id', 'facture_id');
  }

}
