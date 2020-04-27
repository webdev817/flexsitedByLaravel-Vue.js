<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\ContactUs;

use Hash;

class AdminController extends Controller
{


    public function home(Request $request)
    {
        return view('admin.home');
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
