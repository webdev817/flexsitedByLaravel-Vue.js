<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
  public function category(){
    return $this->hasOne('App\DesignCategory','id','categoryId');
  }
}
