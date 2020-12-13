<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class chantier extends Model
{
  use HasFactory;
  use SoftDeletes;

  public function entreprise()
  {
      return $this->belongsToMany('App\Models\entreprise');
  }
  public function client()
  {
      return $this->belongsToMany('App\Models\client');
  }

}
