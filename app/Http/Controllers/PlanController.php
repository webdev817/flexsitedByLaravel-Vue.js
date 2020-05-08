<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;
use StripeHelper;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $plans = Plan::all();
      return view('admin.plans.index', compact('plans'));
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
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {

        return view('admin.plans.addEdit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
      $request->validate([
        'price'=> 'required|min:1|max:255',
        'priceYearlyMonthly'=> 'required|min:1|max:255',
        'priceYearly'=> 'required|min:1|max:255',
      ]);

      if ($plan->price != $request->price) {
        $plan->price = $request->price;

        StripeHelper::deletePlan($plan->stripePlanMonthId);
        $result = StripeHelper::createFlexSitedPlan($plan, 'month');
        if ($result instanceof \Exception) {
          return errorMessage($result->getMessage());
        }
        $plan->save();
      }

      if ($plan->priceYearly != $request->priceYearly || $plan->priceYearlyMonthly != $request->priceYearlyMonthly) {
        $plan->priceYearlyMonthly = $request->priceYearlyMonthly;
        $plan->priceYearly = $request->priceYearly;

        StripeHelper::deletePlan($plan->stripePlanYearId);
        $result = StripeHelper::createFlexSitedPlan($plan, 'year');
        if ($result instanceof \Exception) {
          return errorMessage($result->getMessage());
        }
        $plan->save();
      }

      return statusTo('Plan recreated successfully', route('plans.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
