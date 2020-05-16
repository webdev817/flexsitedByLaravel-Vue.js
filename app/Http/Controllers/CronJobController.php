<?php

namespace App\Http\Controllers;

use App\CronJob;
use Illuminate\Http\Request;
use App\User;


class CronJobController extends Controller
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
     * @param  \App\CronJob  $cronJob
     * @return \Illuminate\Http\Response
     */
    public function show(CronJob $cronJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CronJob  $cronJob
     * @return \Illuminate\Http\Response
     */
    public function edit(CronJob $cronJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CronJob  $cronJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CronJob $cronJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CronJob  $cronJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(CronJob $cronJob)
    {
        //
    }

    public function sendUserEmail(Request $request)
    {
      $latest = CronJob::orderBy('id', 'desc')->first();
      if ($latest != null) {

        $users = User::where('role','!=',9)
        ->where('created_at','>=', $latest->created_at)
        ->where('created_at','<=', date('Y-m-d H:i:s'))
        ->get();
      }else {
        $users = User::where('role','!=',9)
        ->get();
      }

      if ($users->count()) {
        sendUserReportEmail([
          'email'=> 'hello@flexsited.com',
          'users'=> $users
        ]);
        $cronJob = new CronJob;
        $cronJob->subject = "userreport";
        $cronJob->save();

        return "sent";
      }else {
        return "no new user";
      }


    }
}
