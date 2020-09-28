<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\ProjectChat;
use App\ProjectAttachment;
use App\ProjectMilestoneChat;
use App\SupportChat;
use App\SupportChatSession;
use App\Wizered;
use App\Notification;
use Storage;

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
        $projects = Project::join('users', 'users.id', '=', 'projects.createdBy')
                           ->addSelect('projects.*');

        if (superAdmin()) {
        }else {
          $projects = $projects->where('projects.createdBy', Auth::id());
        }
        $projects = $projects->orderBy('projects.id','desc')->paginate(10);
        // dd($projects);

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
      if ($status == "InProgress")
      {
        $statusmessage = "In Progress";
      }
      else if($status == "InReview")
      {
        $statusmessage = "In Review";
      }
      else{
        $statusmessage = $status;
      }
      
      newNoti(1, "Project is $statusmessage...", $project->title . " is $statusmessage ", route('projects.show',$project->id), $project->createdBy);
      $user = $project->user;
      $descriptions = "Your project is $statusmessage.";
      $message = "[FLEXSITED]: Your project is $statusmessage.
Please login in your account https://portal.flexsited.com/login to review the details.";
      $data = [
          'email' => $user->email,
          'user' => $user,
          'description'=> $descriptions
        ];
      $sms = [
        // 'phone' =>"+16787411928",
        'phone' => $user->phone,
        'message'=>$message,
      ];
   
      sendProjectUpdateEmail($data);
      sendSMS($sms);
      return status('Status updated successfully');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
      $user = $project->user;
      $descriptions = "Your Project has been updated.";
      $message = "[FLEXSITED]: Your Project has been updated. 
Please login in your account https://portal.flexsited.com/login to review the details.";
      $data = [
          'email' => $user->email,
          'user' => $user,
          'description'=> $descriptions
        ];
      $sms = [
        'phone' =>$user->phone,
        // 'phone' => '+16787411928',
        'message'=>$message,
      ];
      sendSMS($sms);
      sendProjectUpdateEmail($data);
    }
    public function projectFeedback(Request $request, Project $project){
      if ($project->createdBy != Auth::id() && !superAdmin()) {
        return noPermission();
      }
      $data = $request->validate([
        'stars'=> 'required|string',
        'improveMessage'=> 'required|string'
      ]);
      newNoti(1, "Project Rating", $project->title . " has a feedback", route('projectReview'), 0);

      Project::where('id',$project->id)->update($data);
      $user = $project->user;
      $descriptions = "Your Project Rating has a feedback.";
      $message = "[FLEXSITED]: Your Project Rating has a feedback. 
Please login in your account https://portal.flexsited.com/login to review the details.";
      $data = [
          'email' => $user->email,
          'user' => $user,
          'description'=> $descriptions
        ];
      $sms = [
        'phone' =>$user->phone,
        // 'phone' => '+16787411928',
        'message'=>$message,
      ];

      
      sendSMS($sms);
      sendProjectUpdateEmail($data);
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
      newNoti(1, "Project approve", $project->title . " has been approved",
      route('projects.show',$project->id), 0);

      return status('Project approved');
    }
    public function downloadAttachment(Request $request, $id)
    {
      $projectChat = ProjectChat::findOrFail($id);
      if ($projectChat->isAttachment == 1) {

        try {
          return response()->download(Storage::path($projectChat->path), $projectChat->fileName);
        } catch (\Exception $e) {
          return abort(404);
        }

      }else {
        return abort(404);
      }


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

      if (superAdmin()) {
        newNoti(1, "Project feedbackcomment","New " .$project->title . " project Feedback Comment", route('projects.show',$project->id), $project->createdBy);
      }else {
        newNoti(1, "Project feedbackcomment", "New " .$project->title . " project Feedback Comment",
        route('projects.show',$project->id), 0);
      }


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
        'file'=> 'required|max:30000',
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
      $data['path'] = $request->file->storeAs('milestones', $request->file->getClientOriginalName());
      $projectAttachment = new ProjectAttachment($data);

      if ($request->isFinalDeliverAbles == 1) {
        $projectAttachment->isFinalDeliverAbles = 1;
        $projectAttachment->workSourcePath = $request->source->storeAs('source', $request->source->getClientOriginalName());
      }
      newNoti(1, "Project has new work", $project->title . " Project Upload for Review", route('projects.show',$project->id), $project->createdBy);

      $projectAttachment->save();
      Project::where('id',$project->id)->update(['status'=>3]);
      $user = $project->user;
      $descriptions = " Your project  has new work for your review.";
      $message = "[FLEXSITED]: Your project  has new work for your review.
Please login in your account https://portal.flexsited.com/login to review the details.";
      $data = [
          'email' => $user->email,
          'user' => $user,
          'description'=> $descriptions
        ];
      $sms = [
        'phone' =>$user->phone,
        // 'phone' => '+16787411928',
        'message'=>$message,
      ];
      
      sendSMS($sms);
      sendProjectUpdateEmail($data);
      return status('Work uploaded');
    }
}
