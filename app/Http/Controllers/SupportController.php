<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SupportFAQ;

class SupportController extends Controller
{
    public function index(Request $request)
    {
      $arr['faqs'] = SupportFAQ::where('status',1)->get();
      return view('supportPortal.support.index', $arr);
    }
}
