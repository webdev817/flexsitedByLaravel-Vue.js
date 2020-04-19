<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\ProjectChat;
use App\ProjectAttachment;
use App\ProjectMilestoneChat;

use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $arr['project'] = $project;

        $arr['projectChat'] = ProjectChat::where('createdBy', Auth::id())
        ->where('projectId', $project->id)->get();

        return view('supportPortal.project.show', $arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
    public function commentMilestone(Request $request, ProjectAttachment $projectAttachment)
    {
      $project = $projectAttachment->project;

      if ($project->createdBy != Auth::id() && !superAdmin()) {
        return noPermission();
      }
      if ($projectAttachment->status == 2) {
        return errorMessage('This is already approved');
      }
      $projectMilestoneChat = new ProjectMilestoneChat([
        'projectId'=> $project->id,
        'projectAttachmentId'=> $projectAttachment->id,
        'comment'=>$request->message,
        'createdBy'=> Auth::id()
      ]);
      $projectMilestoneChat->save();
      if ($request->status == 2) {
        $projectAttachment->update([
          'status'=> 2
        ]);
        return status('Approved');
      }
      return status('Comment saved');
    }
    public function projectMilestone(Request $request,Project $project)
    {
      $data = $request->validate([
        'file'=> 'required|max:80000',
        'message'=> 'string|nullable'
      ]);

      if ($project->createdBy != Auth::id() && !superAdmin()) {
        return noPermission();
      }
      $data  = [
        'message'=> $request->message
      ];
      $data['createdBy'] = Auth::id();
      $data['projectId'] = $project->id;
      $data['path'] = $request->file->store('milestones');
      $projectAttachment = new ProjectAttachment($data);
      $projectAttachment->save();

      return status('Work uploaded');
    }
}
