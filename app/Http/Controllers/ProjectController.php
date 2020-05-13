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
        $projects = Project::query();

        if (superAdmin()) {
        }else {
          $projects = $projects->where('createdBy', Auth::id());
        }
        $projects = $projects->orderBy('id','desc')->paginate(10);


        $arr['projects'] = $projects;

        return view('supportPortal.project.listProject',$arr);
    }
    public function startProjectWork(Request $request, Project $project)
    {
      if (!superAdmin()) {
        return noPermission();
      }
      if ($project->status != 1) {
        return errorMessage('Project is not in Initialization state');
      }
      if ($project->dueOn == null) {
        return status('Please set Project Due on first.');
      }
      $project->update([
        'status'=> 2
      ]);
      newNoti(1, 'Project is now in progress...', $project->title . " is now in progress", route('projects.show',$project->id), $project->createdBy);
      return status('Status updated successfully');
    }
    public function projectReview()
    {
      $projects = Project::where('status',10 )->where('stars','!=', null)->paginate(20);
      return view('admin.projectRatings.index', compact('projects'));
    }
    public function changeProjectStatus(Request $request, Project $project)
    {
      if (!superAdmin()) {
        return noPermission();
      }
      $project->update([
          'status'=> $request->projectStatus
      ]);
      if ($project->status == 1) {
        $status = "Initializating";
      }elseif ($project->status == 2) {
        $status = "InProgress";
      }elseif ($project->status == 3) {
        $status = "InReview";
      }elseif ($project->status == 10) {
        $status = "Completed";
      }elseif ($project->status == 20) {
        $status = "Canceled";
      }
      newNoti(1, "Project is $status...", $project->title . " is $status ", route('projects.show',$project->id), $project->createdBy);

      return status('Status updated successfully');

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
        if ($project->createdBy != Auth::id() && !superAdmin()) {
          return noPermission();
        }

        if ($project->status == 1 && !superAdmin()) {
          return status('Thank you for your order!  We are processing your order, you will receive a call from a Flexsited Design Specialist within 24 hours');
        }

        $arr['projectChat'] = ProjectChat::where('createdBy', Auth::id())
        ->where('projectId', $project->id)->get();

        $arr['projectAttachments'] = $project->projectAttachments()->where('isFinalDeliverAbles',0)->get();
        $arr['projectFinalDeliverables'] = $project->projectAttachments()->where('isFinalDeliverAbles','!=',0)->get();

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
    public function updateProjectDueDate(Request $request)
    {
      if (!superAdmin()) {
        return noPermission();
      }
      $project = Project::find($request->id);

      $project->update([
        'dueOn'=> $request->date
      ]);

      newNoti(1, "Project Due on is updated", $project->title . " Due Date has been added", route('projects.show',$project->id), $project->createdBy);

    }
    public function projectFeedback(Request $request, Project $project){
      if ($project->createdBy != Auth::id() && !superAdmin()) {
        return noPermission();
      }
      $data = $request->validate([
        'stars'=> 'required|string',
        'improveMessage'=> 'required|string'
      ]);

      Project::where('id',$project->id)->update($data);

      return status('Thanks, your feedback has been saved.');

    }
    public function approveProject(Request $request, Project $project)
    {
      if ($project->createdBy != Auth::id() && !superAdmin()) {
        return noPermission();
      }
      $project->update([
        'status'=> 10
      ]);
      return status('Project approved');
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
      newNoti(1, "Project has new work","New " .$project->title . " project Feedback Comment", route('projects.show',$project->id), $project->createdBy);


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

      if ($request->isFinalDeliverAbles == 1) {
        $projectAttachment->isFinalDeliverAbles = 1;
        $projectAttachment->workSourcePath = $request->source->store('source');
      }
      newNoti(1, "Project has new work", $project->title . " Project Upload for Review", route('projects.show',$project->id), $project->createdBy);

      $projectAttachment->save();
      Project::where('id',$project->id)->update(['status'=>3]);

      return status('Work uploaded');
    }
}
