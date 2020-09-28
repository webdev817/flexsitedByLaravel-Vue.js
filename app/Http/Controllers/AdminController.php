<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

use Auth;
use App\User;
use App\ContactUs;
use App\Project;
use App\ClientTask;
use App\Suggestion;

class AdminController extends Controller
{

    public function suggestions()
    {
      $suggestions = Suggestion::join('users', 'users.id', '=', 'suggestions.createdBy')
      ->addSelect('suggestions.*')->paginate(20);
      return view('admin.suggestions.index',compact('suggestions'));
    }
    public function home(Request $request)
    {

        $arr['totalUsers'] = User::count();
        $arr['totalProjects'] = Project::count();
        $arr['totalProjectsCompleted'] = Project::where('status',10)->count();
        $arr['totalProjectsInProgress'] = Project::where('status',2)->count();
        $arr['totalClientTask'] = ClientTask::count();
        $arr['totalClientTaskCompleted'] = ClientTask::where('status',2)->count();

        $thisMonthDay = date("t");
        $arr['orderDueThisMonth'] = Project::whereDate('dueOn' ,'>=', date('Y-m') . "-1 00:00:00")
                                           ->whereDate('dueOn' ,'<=', date('Y-m') . "-$thisMonthDay 23:59:59")->count();

        return view('admin.home', $arr);

    }

    public function contactUsRequests(Request $request)
    {
      $contactMessages = ContactUs::paginate(20);
      return view('supportPortal.contactUs.list', compact('contactMessages'));
    }
    public function login(Request $request)
    {
      if (Auth::check()) {
        return redirect()->route('adminHome');
      }
      return view('admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
      $data = $request->validate([
          'email' => 'required|string',
          'password' => 'required|string',
      ]);
      $isLoggedIn = Auth::attempt($data);
      if (!$isLoggedIn) {
        return errorMessage('Credentials do not match');
      }

      return redirect()->route('adminHome');
    }
    public function adminRegisterCreate()
    {
        $request = request();
        $user = User::where('email',$request->email)->where('status',2)->first();
        if ($user != null) {
          return back()->withErrors([
            'Email is associated with a closed account'
          ]);
        }

        $this->validator($request->all())->validate();
        

        event(new Registered($user = $this->create($request->all())));

        // newNoti(1, "new admin registered","admin user " . $user->name . " has registered",
        // route('clientOnBoarding',$user->id), 0);

        Auth::login(User::find($user->id));

        return redirect()->route('adminHome');
                     
    }
    public function register(){

      return view('admin.auth.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make(
            $data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create(
            [
            'name' => $data['name'],
            'email' => $data['email'],
            'role'  => 9,
            'password' => Hash::make($data['password']),
            ]
        );
        $user->rawPassword = $data['password'];

        return $user;

    }


}
