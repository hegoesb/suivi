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
}