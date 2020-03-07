<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function supportPortalHome(Request $request)
    {
      return view('supportPortal.home');
    }
}
