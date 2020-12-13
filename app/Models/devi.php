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


}
