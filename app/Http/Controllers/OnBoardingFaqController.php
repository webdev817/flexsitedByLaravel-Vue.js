<?php

namespace App\Http\Controllers;

use App\OnBoardingFaq;
use Illuminate\Http\Request;
use Auth;

class OnBoardingFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onBoardingFaqs = OnBoardingFaq::paginate(20);
        return view('admin.onboardingFaqs.index', compact('onBoardingFaqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = [
        'domain',
        'design'
      ];
      $arr['categories'] = $categories;

      return view('admin.onboardingFaqs.addEdit',$arr);
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

      $onBoardingFaq = new OnBoardingFaq($data);
      $onBoardingFaq->save();

      return statusTo('Question is added' , route('onBoardingFaqs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OnBoardingFaq  $onBoardingFaq
     * @return \Illuminate\Http\Response
     */
    public function show(OnBoardingFaq $onBoardingFaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OnBoardingFaq  $onBoardingFaq
     * @return \Illuminate\Http\Response
     */
    public function edit(OnBoardingFaq $onBoardingFaq)
    {
      $categories = [
        'domain',
        'design'
      ];
      $arr['categories'] = $categories;
      $arr['onBoardingFaq'] = $onBoardingFaq;

      return view('admin.onboardingFaqs.addEdit',$arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OnBoardingFaq  $onBoardingFaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnBoardingFaq $onBoardingFaq)
    {
      $data = $request->validate([
        'question'=> 'required|string|max:255',
        'status' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'answer' => 'required|string|max:1500',
      ]);


      $onBoardingFaq->update($data);

      return statusTo('Question is updated' , route('onBoardingFaqs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OnBoardingFaq  $onBoardingFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnBoardingFaq $onBoardingFaq)
    {
      $onBoardingFaq->delete();

      return status("Question deleted.");
    }
}
