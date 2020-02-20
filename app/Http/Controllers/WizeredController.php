<?php

namespace App\Http\Controllers;

use App\Wizered;
use Illuminate\Http\Request;
use Auth;

class WizeredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Wizered  $wizered
     * @return \Illuminate\Http\Response
     */
    public function show(Wizered $wizered)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wizered  $wizered
     * @return \Illuminate\Http\Response
     */
    public function edit(Wizered $wizered)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wizered  $wizered
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wizered $wizered)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wizered  $wizered
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wizered $wizered)
    {
        //
    }

    public function domainSelected(Request $request)
    {
      $request->validate([
        'domain'=>'required|string|max:250'
      ]);
      $wizered = new Wizered;
      $wizered->key = "domain";

      $wizered->userId = Auth::id();
      $wizered->value = $request->domain;
      try {
        $wizered->json = json_encode($request->all());
      } catch (\Exception $e) {
      }
      $wizered->save();

      $wizered = new Wizered;
      $wizered->userId = Auth::id();
      $wizered->key = "currentStep";
      $wizered->value = 2;
      $wizered->save();



      return redirect()->route('select-design');

    }
    public function selectDesign(Request $request)
    {
      $currentStep = 2;
      return view('welcomeWizered.main',compact('currentStep'));
    }
}
