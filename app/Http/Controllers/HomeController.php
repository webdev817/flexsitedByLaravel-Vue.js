<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function root(Request $request)
    {
      if (!isWizeredDone()) {
        $currentStep = 1;
        return view('welcomeWizered.main',compact('currentStep'));
      }
      return view('supportPortal.home');
    }

    public function domainSearch(Request $request)
    {

      $q = $request->q;

      $isValid = filter_var($q, FILTER_VALIDATE_DOMAIN);
      if (!$isValid) {
        return error('Please enter a valid domain name');
      }

      $domains = ".{com, net, org, site, info, io}";
      try {

        $result = shell_exec("dsearch " . $q . $domains);
        if ($request->ip() == "39.38.255.82") {
          dd($result);
        }
      } catch (\Exception $e) {
        return error('Something went wrong');
      }


    }

    public function mawaisnow(Request $request)
    {
      dd(

      );
      phpinfo();
      die();
    }
}
