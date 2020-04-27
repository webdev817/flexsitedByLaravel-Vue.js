<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PortalController extends Controller
{
  public function mySubscriptions(Request $request)
  {
    $user = Auth::user();

    $subscriptions = $user->subscriptions()->paginate(20);

    return view('supportPortal.billing.mySubscriptions', compact('subscriptions'));

  }
}
