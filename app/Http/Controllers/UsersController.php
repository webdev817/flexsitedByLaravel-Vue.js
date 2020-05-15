<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class UsersController extends Controller
{
    public function __construct()
    {
      $this->middleware('SuperAdminOnly')->except([
        'edit','update', 'changePassword', 'changePasswordStore',
        'profile', 'closeAccount'
      ]);
    }
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
    public function edit($id = null)
    {
        if ($id == null && !superAdmin()) {
          $id = Auth::id();
        }
        $user = User::findOrFail($id);
        return view('admin.users.editUser', compact('user'));
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
        $request->validate([
          'name'=> 'required|max:255|min:1',
          'businessName'=> 'required|max:255|min:1',
          'password' => ['nullable', 'string', 'min:6'],
          'phone'=> 'required|min:4|max:30'
        ]);
        if ($request->password != $request->password_confirm) {
          return errorMessage('Password does not matched.');
        }

        $user = User::findOrFail($id);
        if (!superAdmin() && $user->id != Auth::id()) {
          return noPermission();
        }
        $user->name = $request->name;
        $user->businessName = $request->businessName;

        if ($request->hasFile('image')) {
          $request->validate([
            'image'=> 'mimes:jpeg,jpg,png,gif|required|max:10000'
          ]);
          $user->image = $request->image->store('profilePics');
        }
        if (superAdmin()) {
          if ($request->status == 1) {
            $user->status = 1;
          }elseif ($request->status == 2) {
            $user->status = 2;
          }else{
            $user->status = 0;
          }

        }

        if ($request->password != null) {
          $user->password = Hash::make($request->password);
        }
        $user->phone = $request->phone;

        $user->save();

        return statusTo('User updated', route('users.index'));
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
        // Project::where('')


        return statusTo('User deleted successfully', route('users.index'));
    }

    public function clientOnBoarding(Request $request, User $user)
    {
        $invoices = null;

        $array = [
           'user' => $user ,
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

    public function changePassword(Request $request)
    {
      $user = Auth::user();
      $intent = $user->createSetupIntent();


      return view('supportPortal.users.changePassword', compact('user', 'intent'));
    }
    public function changePasswordStore(request $request)
    {
      $userId = Auth::id();

      $isSame = $request->password == $request->password_confirm;

      if (!$isSame) {
        return errorMessage("Password confirm does not match");
      }
      User::where('id', $userId)->update(
          [
         'password' => Hash::make($request->password),
         ]
      );
      return status('Password changed');
    }


    public function profile()
    {
      $user = Auth::user();
      $invoices = $user->invoices(true,['limit'=> 100]);
      $intent = $user->createSetupIntent();

      return view('supportPortal.users.profile', compact('user','invoices', 'intent'));

    }
    public function closeAccount(Request $request)
    {

      $request->validate([
        'password'=> "required|max:255",
        'password_confirm'=> 'required',
        'reasontoclose'=> 'required|max:1000'
      ]);

      if ($request->password != $request->password_confirm) {
        return errorMessage("Password confirm does not match");
      }
      $user = User::find(Auth::id());
      if (!Hash::check($request->password, $user->password)) {
        return errorMessage("Wrong Password");
      }
      // dd(
      //   Auth::id()
      // );
      // deleteAllUserData(Auth::id());

      User::where('id', Auth::id())->update([
        'status'=>2
      ]);

      $subscriptions = Auth::user()->subscriptions();

      foreach ($subscriptions as $subscription) {
        $subscription->cancelNow();
      }

      Auth::logout();
      return statusTo("We are sorry to see you go", route('login'));
    }

}
