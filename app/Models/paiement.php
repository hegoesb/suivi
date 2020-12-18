<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paiement extends Model
{
    use HasFactory;

  public function client()
  {
      return $this->belongsTo('App\Models\client');
  }
  public function facture()
  {
      return $this->belongsToMany('App\Models\facture', 'facture_paiement', 'facture_id', 'paiement_id');
  }
  public function type_paiement()
  {
      return $this->belongsTo('App\Models\type_paiement');
  }
}
