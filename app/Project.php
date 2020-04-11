<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function order(){
      return $this->hasOne('App\Order','id','orderId');
    }
}
