<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;
use Carbon\Carbon;
use StripeHelper;
use App\User;
use Auth;

class BillingController extends Controller
{
    public function allSubscriptions(Request $request)
    {
        $users = User::with('subscriptions')->where('role', 1);
        $users = $users->paginate(10);

        return view('billing.allSubscriptions', compact('users'));
    }


    public function subscriptions(Request $request)
    {
        $subscriptions = $request->user()->subscriptions;
        $user = $request->user();
        return view('billing.subscriptions', compact('subscriptions', 'user'));
    }


    public function subscriptionHistory(Request $request, $subscriptionId)
    {
        if (superAdmin()) {
            $user = Subscription::find($subscriptionId)->user;
        } else {
            $user = Auth::user();
        }


        $subscription = $user->subscriptions->where('id', $subscriptionId)->first();

        if ($subscription == null) {
            return error("No Subscription Found");
        }

        $invoices = $user->invoices(
            true,
            [
         'subscription'=>$subscription->stripe_id
         ]
        );
        $upcomingInvoice = null;
        if (!$subscription->ended()) {
            $upcomingInvoice = $user->upcomingInvoice(
                [
           'subscription'=>$subscription->stripe_id
           ]
            );
        }


        return view('billing.subscriptionHistory', compact('upcomingInvoice', 'invoices', 'user', 'subscription'));
    }

    public function cancelSubscription(Request $request, $type = 1)
    {
        $request->validate(
            [
         'subscription'=>'required|integer'
         ],
            [
         'subscription.required'=>'Please choice a valid subscription'
         ]
        );

        $subscriptionId = $request->subscription;
        if (superAdmin()) {
            $user = Subscription::find($subscriptionId)->user;
        } else {
            $user = Auth::user();
        }


        $subscription = $user->subscriptions->where('id', $subscriptionId)->first();


        if ($subscription == null) {
            return error("No Subscription Found");
        }



        if ($subscription->ended()) {
            return status('Subscription is already ended');
        }
        if ($request->cancelNow) {
            try {
                $subscription->cancelNow();
            } catch (\Exception $e) {
                return error($e->getMessage());
            }
        }

        return status("Subscription cancelled successfully.");
    }

    public function getUpdateCard(Request $request)
    {
        $user = Auth::user();
        return view(
            'billing.updateCard',
            [
          'intent'=>$user->createSetupIntent()
          ]
        );
    }
    public function updateCard(Request $request)
    {
        $user = Auth::user();



        $request->validate(
            [
            'paymentMethod'=>'required'
            ]
        );
        $paymentMethod = $request->paymentMethod;

        $obj = StripeHelper::updateCard($paymentMethod);

        if ($obj->status == 0) {
            return error($obj->message);
        }

        return redirect()->route('profile')->with('status', 'Billing information updated');
    }
    public function invoiceDownload(Request $request, $id)
    {
        // 2414 E 117th St, Burnsville, MN 55337
        // (that’s street, city, state, zip)
        // 612-227-2746
        if (superAdmin()) {
            $user = User::find($request->userId);
        } else {
            $user = $request->user();
        }
        try {
            return $user->downloadInvoice(
                $id,
                [
                    'vendor'  => config('mawaisnow.title'),
                    'product' => 'Flexsited',
                    'street' => '1755 NORTH BROWN',
                    'location' => 'ROAD SUITE 200, LAWRENCEVILLE, GA 30043',
                    'phone' => '678-741-1928',
                    'url'=> url('/')
                  ]
            );
        } catch (\Exception $e) {
            return errorMessage($e->getMessage());
        }
    }


    public function createAllPlans(Request $request)
    {
        // The frequency at which a subscription is billed. One of day, week, month or year.


        $plans = flexsitedPlans();

        foreach ($plans as $p) {
          StripeHelper::deletePlan($p->stripePlanMonthId);
          StripeHelper::deletePlan($p->stripePlanYearId);

          StripeHelper::createFlexSitedPlan($p, 'month');
          StripeHelper::createFlexSitedPlan($p, 'year');
        }

        $plans = StripeHelper::allPlans();


        $c = collect();

        foreach ($plans as $plan) {
            $c->push([
          'Name' => $plan->nickname,
          'amount'=> $plan->amount,
          'interval'=> $plan->interval
        ]);
        }
        echo "<style>pre.sf-dump .sf-dump-compact {
    display: block !important;
}</style>";
        dd(
            $c
        );
    }
}
