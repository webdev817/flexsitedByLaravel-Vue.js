<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectAttachment extends Model
{
    protected $guarded = [];

    public function project()
    {
      return $this->belongsTo('App\Project','projectId', 'id');
    }
    public function milestoneChat()
    {
        return $this->hasMany('App\ProjectMilestoneChat', 'projectAttachmentId', 'id' );
    }
}
