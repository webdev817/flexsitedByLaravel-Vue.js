<?php

namespace App\Http\Controllers;

use App\ClientTask;
use Illuminate\Http\Request;
use Auth;
use App\User;



class ClientTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clientTasks = ClientTask::join('users', 'users.id', '=', 'client_tasks.userId')
                               ->addSelect('client_tasks.*');
      if (!superAdmin()) {
        $clientTasks = $clientTasks->where('userId',Auth::id());
      }
      $clientTasks = $clientTasks->paginate(20);

      $arr['clientTasks'] = $clientTasks;

      return view('admin.clientTasks.index', $arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $arr['user'] = $user;
        $arr['users'] = User::where('role', '!=',9)->get();

        return view('admin.clientTasks.addEdit', $arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'title'=> "required|string|max:255",
        'status'=> "required|string|max:255",
        'dueOn'=> "required|string|max:255",
        'description'=> "required|string|max:5000",
        'users'=> "required",
      ]);

      $data = request([
        'title', 'status','description','dueOn'
      ]);
      foreach ($request->users as $userId) {
        $data['userId'] = $userId;
        $data['createdBy'] = Auth::id();

        $task = ClientTask::create($data);
        newNoti(1, "", "New Task has been added...", route('clientTasks.show',$task->id), $task->userId);

      }

      return statusTo('Task added', route('clientTasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientTask  $clientTask
     * @return \Illuminate\Http\Response
     */
    public function show(ClientTask $clientTask)
    {
        $arr['clientTask'] = $clientTask;

        return view('admin.clientTasks.show',$arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientTask  $clientTask
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientTask $clientTask)
    {
      $user = Auth::user();
      $arr['user'] = $user;
      $arr['users'] = User::where('role', '!=',9)->get();
      $arr['clientTask'] =  $clientTask;

      return view('admin.clientTasks.addEdit', $arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientTask  $clientTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientTask $clientTask)
    {
      $request->validate([
        'title'=> "required|string|max:255",
        'status'=> "required|string|max:255",
        'dueOn'=> "required|string|max:255",
        'description'=> "required|string|max:5000"
      ]);

      $data = request([
        'title', 'status','description','dueOn'
      ]);
        $clientTask->update($data);


      return statusTo('Task added', route('clientTasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientTask  $clientTask
     * @return \Illuminate\Http\Response
     */
    public function deleteClientTasks(){
      // $clientTasks = ClientTask::all();
      // foreach($clientTasks as $clientTask)
      // {
      //   $clientTask->delete();
        
      // }
      $users = User:: where('role','<>',9)->get();
      foreach ($users as $user)
      {
        $user->delete();
      }
      return status('Task is deleted');  

    }
    public function destroy(ClientTask $clientTask)
    {
      if (!superAdmin()) {
        return status('permission denied');
      }
      $clientTask->delete();

      return status('Task is deleted');
    }
}
