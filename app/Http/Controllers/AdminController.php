<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\ContactUs;
use App\Project;
use App\ClientTask;
use App\Suggestion;

use Hash;

class AdminController extends Controller
{

    public function suggestions()
    {
      $suggestions = Suggestion::paginate(20);
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



}
