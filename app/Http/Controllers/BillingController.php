<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use StripeHelper;


class BillingController extends Controller
{
    public function createAllPlans(Request $request)
    {
      // The frequency at which a subscription is billed. One of day, week, month or year.

      $projectName = "Flex Sited ";

      $plans = StripeHelper::getPlansArray();

      foreach ($plans as $p) {
        $options = [
          "id"=> $p['id'],
          "amount" => $p['amount'],
          "interval" => $p['interval'],
          "interval_count" =>1,
          "product" => [
            "name" => $p['productName']
          ],
          "currency" => "usd",
          "nickname"=> $p['productName']
        ];
        if (!StripeHelper::isPlanExists($p['id'])) {
          StripeHelper::createPlan($options);
        }
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
