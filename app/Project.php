<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->hasOne('App\Order', 'id', 'orderId');
    }
    public function projectAttachments()
    {
        return $this->hasMany('App\ProjectAttachment', 'projectId', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'createdBy');
    }
    // createdBy
}
