<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientTask extends Model
{
  protected $guarded = [];

  public function user()
  {
      return $this->hasOne('App\User', 'id', 'userId');
  }

}
