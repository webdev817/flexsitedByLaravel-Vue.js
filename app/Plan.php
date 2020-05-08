<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
  public function offers()
  {
    return $this->hasMany('App\PlanOffer','planId','id');
  }
}
