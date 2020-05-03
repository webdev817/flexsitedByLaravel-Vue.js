<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\MarketingService;
use App\ClientTask;

use stdClass;
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

  public function handleSuperAdmin($request)
  {
    return redirect()->route('adminHome');
    // $usersCount = User::where('role',1)->count();
    // return view('admin.home',compact('usersCount'));
  }
  public function root(Request $request)
  {
    if (superAdmin()) {
      return $this->handleSuperAdmin($request);
    }

    if (!isWizeredDone()) {
      $currentStep = 1;
      return view('welcomeWizered.main', compact('currentStep'));
    }


    if (isWizeredDone()) {
      $orders = Order::has('project')->where('createdBy',Auth::id())->get();

      $webDevelopment = Order::where('type',4)->where('createdBy',Auth::id())->count();
      $graphicDesing = Order::where('type','!=',4)->where('createdBy',Auth::id())->count();
      $marketingCount = MarketingService::where('createdBy',Auth::id())->count();
      $clientTaskObj = new stdClass;


      $clientTaskObj->totalCount = ClientTask::where('userId', Auth::id())->count();

      $clientTaskObj->completedCount = ClientTask::where('userId', Auth::id())->where('status',2)->count();

      if ($clientTaskObj->totalCount == 0) {
        $clientTaskObj->percentage = 0;
      }else {
        $clientTaskObj->percentage = round(($clientTaskObj->completedCount / $clientTaskObj->totalCount) * 100);
      }

      $clientTaskObj->tasks = ClientTask::where('userId', Auth::id())->where('status', 1)->paginate(2);

      return view('supportPortal.home', compact('orders', 'webDevelopment', 'graphicDesing', 'marketingCount','clientTaskObj'));
    }
  }



  public function domainSearch(Request $request)
  {

    $q = $request->q;

    $isValid = filter_var($q, FILTER_VALIDATE_DOMAIN);
    if (!$isValid) {
      return error('Please enter a valid domain name');
    }

    $domains = ["com", "net", "org", "site", "info ", "io"];
    $allDomains = [];
    try {

      foreach ($domains as $domain) {
        $obj = new stdClass;
        $obj->status = 0;

        $obj->domain = $q  . ".". $domain;
        $result = shell_exec("dsearch " . $q ."." . $domain);

        if (strpos($result, 'AVAILABLE') !== false) {
          $obj->status = 1;
        }
        $allDomains[] = $obj;
      }

      return json('Domains List', $allDomains);
    } catch (\Exception $e) {
      return error('Something went wrong');
    }
  }


  public function mawaisnow(Request $request)
  {


    return view('mawaisnow');
  }
}
