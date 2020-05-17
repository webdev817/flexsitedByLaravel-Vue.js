<?php

namespace App\Http\Controllers;

use App\Referal;
use Illuminate\Http\Request;

class ReferalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supportPortal.referal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function show(Referal $referal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function edit(Referal $referal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referal $referal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referal $referal)
    {
        //
    }


    public function invite(Request $request, $id)
    {
      return redirect()->route('welcomeFlexsited', $id);
    }
    public function welcomeFlexsited(Request $request, $id)
    {
      return view('frontend.referral', compact('id'));
    }
    public function saveReferal(Request $request)
    {
      $data = $request->validate([
        'name' => 'required|min:2|max:255',
        'businessPhoneNumber' => 'required|min:2|max:255',
        'email' => 'required|email|min:2|max:255',
      ]);

      if ($request->logoDesign == "on") {
        $data['logoDesign'] = 1;
      }
      if ($request->businessCardDesign == "on") {
        $data['businessCardDesign'] = 1;
      }

      if ($request->flayerDesign == "on") {
        $data['flayerDesign'] = 1;
      }
      if ($request->Website == "on") {
        $data['Website'] = 1;
      }
      if ($request->marketing == "on") {
        $data['marketing'] = 1;
      }
      $data['userInvitedBy'] = $request->userInvitedBy;

      $ref = new Referal($data);
      $ref->save();

      newNoti(1, "New referal", "New referal request received",
      route('referals'), 0);

      return status('We have received your information. We will be in touch soon');
    }

    public function referals(Request $request)
    {
      $referals = Referal::paginate(20);
      return view('admin.invitedSignUp.index',compact('referals'));
    }
}
