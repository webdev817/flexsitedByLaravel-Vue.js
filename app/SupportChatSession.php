<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportChatSession extends Model
{
    protected $guarded = [];

    public function user()
    {
      return $this->hasOne('App\User', 'id', 'createdBy');
    }
}
