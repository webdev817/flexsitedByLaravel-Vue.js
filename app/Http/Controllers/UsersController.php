<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 1)->paginate(10);
        return view('admin.users.index', compact('users'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.editUser');
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
        $user = User::find($id);
        try {
            if ($user->subscription('main') != null) {
                $user->subscription('main')->cancelNow();
            }
        } catch (\Exception $e) {
            return errorMessage($e->getMessage());
        }
        User::where('id', $id)->delete();

        return statusTo('User deleted successfully', route('users.index'));
    }

    public function clientOnBoarding(Request $request, User $user)
    {
        $invoices = null;

        $array = [ 'user' => $user ,
                   'mainSubscription'=> $user->subscription('main'),
                   'wizeredObj'=> getWizeredObj($user->id),
                ];

        return view('admin.users.clientOnBoarding', $array);
    }

    public function changeUserStatus(Request $request)
    {
        if (!isSuperAdmin()) {
            return noPermission();
        }
        $status = $request->status;
        $userId = $request->userId;
        $user = User::find($userId);

        User::where('id', $userId)->update(
            [
           'status' => $status,
           ]
        );

        return status("Status changed successfully");
    }
}
