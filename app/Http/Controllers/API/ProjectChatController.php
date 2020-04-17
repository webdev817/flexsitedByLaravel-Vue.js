<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\ProjectChat;
use App\ProjectChatAttachment;
use Auth;

class ProjectChatController extends Controller
{

    public function projectChatMine(Request $request)
    {
      $projectId = $request->projectId;
      $project = Project::find($projectId);
      if ($project == null) {
        return error('project does not exists');
      }
      if (!superAdmin() && $project->createdBy != Auth::id()) {
        return error("Not Authorized");
      }

      if ($request->lastId == null) {
        $projectChat = ProjectChat::where('projectId', $projectId);
        $projectChat = $projectChat->orderBy('id','asc')->get();
        $status = 0;
      }else {
        $status = 1;
        $projectChat = ProjectChat::where('projectId', $projectId);
        $projectChat = $projectChat->where('createdBy', '!=',Auth::id());
        $projectChat = $projectChat->where('id','>', $request->lastId);

        $projectChat = $projectChat->orderBy('id','asc')->get();
      }

      return json('success',[
        'projectChat'=>$projectChat,
        'status'=> $status
      ]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $projectId = $request->projectId;
      $project = Project::find($projectId);
      if ($project == null) {
        return error('project does not exists');
      }
      if (!superAdmin() && $project->createdBy != Auth::id()) {
        return error("Not Authorized");
      }

      $projectChat = ProjectChat::where('projectId', $projectId);

      $projectChat = $projectChat->orderBy('id','asc')->get();
      return $projectChat;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $message = $request->message;
      $projectId = $request->projectId;

      if ($message == null || $message == "") {
        return error('Message is empty');
      }
      $project = Project::find($projectId);
      if ($project == null) {
        return error('project does not exists');
      }
      if (!superAdmin() && $project->createdBy != Auth::id()) {
        return error("Not Authorized");
      }
      $projectChat = new ProjectChat([
        'message'=> $message,
        "projectId"=> $projectId,
        'createdBy'=> Auth::id(),
        'isAttachment'=> 0,
      ]);

      $projectChat->save();

      return json('saved successfully',$projectChat);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
