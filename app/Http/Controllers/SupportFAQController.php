<?php

namespace App\Http\Controllers;

use App\SupportFAQ;
use Illuminate\Http\Request;
use Auth;

class SupportFAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supportFaqs = SupportFAQ::paginate();
        return view('admin.supportFAQ.index', compact('supportFaqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = [
          'General', 'Tasks', 'Plans', 'Payment', 'Profile'
        ];
        $arr['categories'] = $categories;

        return view('admin.supportFAQ.addEdit',$arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
          'question'=> 'required|string|max:255',
          'status' => 'required|string|max:255',
          'category' => 'required|string|max:255',
          'answer' => 'required|string|max:1500',
        ]);

        $data['createdBy'] = Auth::id();

        $supportFaq = new supportFAQ($data);
        $supportFaq->save();

        return statusTo('Question is added' , route('supportFAQ.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupportFAQ  $supportFAQ
     * @return \Illuminate\Http\Response
     */
    public function show(SupportFAQ $supportFAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupportFAQ  $supportFAQ
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportFAQ $supportFAQ)
    {
      $categories = [
        'General', 'Tasks', 'Plans', 'Payment', 'Profile'
      ];
      $arr['categories'] = $categories;
      $arr['supportFaq'] = $supportFAQ;

      return view('admin.supportFAQ.addEdit',$arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupportFAQ  $supportFAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportFAQ $supportFAQ)
    {
      $data = $request->validate([
        'question'=> 'required|string|max:255',
        'status' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'answer' => 'required|string|max:1500',
      ]);


      $supportFAQ->update($data);

      return statusTo('Question is updated' , route('supportFAQ.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupportFAQ  $supportFAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportFAQ $supportFAQ)
    {
        $supportFAQ->delete();

        return status("Question deleted.");
    }
}
