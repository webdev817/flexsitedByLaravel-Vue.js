<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Addon;
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
      $addon = Addon::all()->first();
      return view('admin.plans.index', compact('plans','addon'));
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

        return view('admin.plans.planEdit', compact('plan'));
    }
    public function addonEdit($id)
    {
        $addon = Addon::findOrFail($id);
        return view('admin.plans.addonEdit', compact('addon'));
    }

    public function addonUpdate(Request $request, $id)
    {
         

        $request->validate([
            'logoDesignPrice'=> 'required|min:1|max:255',
            'cardDesignPrice'=> 'required|min:1|max:255',
            'flyerDesignPrice'=> 'required|min:1|max:255',
            'socialMediaDesignPrice'=> 'required|min:1|max:255',
          ]);
        
        $addon = Addon::findOrFail($id);
        $addon->logoDesignPrice = $request->logoDesignPrice;
        $addon->cardDesignPrice = $request->cardDesignPrice;
        $addon->flyerDesignPrice = $request->flyerDesignPrice;
        $addon->socialMediaDesignPrice = $request->socialMediaDesignPrice;
        $addon->save();
        return statusTo('addon recreated successfully', route('plans.index'));
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
