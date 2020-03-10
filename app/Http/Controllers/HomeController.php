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

      try {
        $result = Helper::domainSearch($q);
        return $result;
      } catch (\Exception $e) {
        return error('Something went wrong',['home:43',$e->getMessage()]);
      }


    }

    public function mawaisnow(Request $request)
    {
      dd(

        shell_exec("dir")
      );
      phpinfo();
      die();
    }
}
