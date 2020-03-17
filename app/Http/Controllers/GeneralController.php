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
      $pageWidth = setting('pageWidth',null);

      if ($pageWidth == null) {
        setSetting('pageWidth','slim-full-width');
      }else {
        setSetting('pageWidth',null);
      }
      return status('Done');
    }
}
