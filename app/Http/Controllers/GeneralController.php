<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function supportPortalHome(Request $request)
    {
      return view('supportPortal.home');
    }
    public function switchPageWidth(Request $request)
    {
      $pageWidth = setting('pageWidth','container');
      
      if ($pageWidth == "container") {
        setSetting('pageWidth','fluid-container');
      }else {
        setSetting('pageWidth','container');
      }
      return status('Done');
    }
}
