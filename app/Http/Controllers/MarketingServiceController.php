<?php

namespace App\Http\Controllers;

use App\MarketingService;
use Illuminate\Http\Request;
use Auth;

class MarketingServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('supportPortal.marketingService.index');
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
        $request->validate([

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MarketingService  $marketingService
     * @return \Illuminate\Http\Response
     */
    public function show(MarketingService $marketingService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MarketingService  $marketingService
     * @return \Illuminate\Http\Response
     */
    public function edit(MarketingService $marketingService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MarketingService  $marketingService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarketingService $marketingService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MarketingService  $marketingService
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarketingService $marketingService)
    {
        //
    }
}
