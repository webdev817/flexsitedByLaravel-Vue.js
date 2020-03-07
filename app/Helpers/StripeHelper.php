<?php

namespace App\Helpers;

use Stripe\Stripe;
use Stripe\Plan as StripePlan;
use Stripe\Subscription as StripeSubscription;
use Laravel\Cashier\Exceptions\IncompletePayment;

use Stripe\Card as StripeCard;
use Stripe\Token as StripeToken;
use Stripe\Charge as StripeCharge;
use Stripe\Refund as StripeRefund;
use Stripe\Invoice as StripeInvoice;
use Stripe\Customer as StripeCustomer;
use Stripe\BankAccount as StripeBankAccount;
use Stripe\InvoiceItem as StripeInvoiceItem;
use App\Setting;
use stdClass;
use Carbon\Carbon;

use Auth;

class StripeHelper
{
    private static $isInit = false;



    public static function chargeSuccess()
    {
        // userUpdate(
        //     [
        //     'isBillingError'=>0,
        //     'billingError'=>null,
        //     'chargeFailed'=> 0
        //     ]
        // );
    }
    public static function failedCharge($message)
    {
        // userUpdate(
        //     [
        //     'isBillingError'=>1,
        //     'billingError'=>$message,
        //     'chargeFailed'=> 1
        //     ]
        // );
    }
    public static function updateCard($paymentMethod)
    {
        $obj = new \stdClass;
        $user = request()->user();

        $title = myConf('title');


        try {
            if (!$user->hasStripeId()) {
                $user->createAsStripeCustomer([
                'description'=> "Customer for $title",
                'name' => $user->name,
                'email'=> $user->email
              ]);
            }

            $user->addPaymentMethod($paymentMethod);
            $user->updateDefaultPaymentMethod($paymentMethod);

            $obj->status = 1;

            self::chargeSuccess();

            return $obj;
        } catch (\Exception $e) {
            $message = $e->getMessage();

            self::failedCharge($message);

            $obj->status = 0;
            $obj->message = $message;
            return $obj;
        }
    }


    public static function chargeForFlexSited( $stripeChargeAmount, $stripeChargeMessage)
    {



      $user = Auth::user();
      $obj = new stdClass;
      $obj->status = 0;
      try {
        $stripeCharge = $user->invoiceFor("Charge for purchasing $stripeChargeMessage at FLEXSITED." , $stripeChargeAmount);

        $obj->status = 1;
        $obj->message = "success";
        $obj->stripeCharge = $stripeCharge;

        return $obj;
      } catch (IncompletePayment $exception) {
          $response = redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('incompletePaymentCompleted')]
            );

          $obj->response = $response;
          $obj->status = 3;

          return $obj;
      }catch (\Exception $e) {

        $obj->message = $e->getMessage();
        return $obj;
      }


    }
    public static function subscribeToPlan($user,  $planId)
    {
      $obj = new stdClass;
      $obj->status = 1;
      $obj->message = "";


      try {


          $subscription = $user->newSubscription($planId, $planId)
          ->create();

          $obj->status = 1;
          $obj->subscription = $subscription;

          return $obj;
      } catch (IncompletePayment $exception) {
          $response = redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('incompletePaymentCompleted')]
            );

          $obj->response = $response;
          $obj->status = 3;

          return $obj;
      } catch (\Exception $e) {
          $user->subscription($planId)->cancelNow();
          // myLog('error while creating subscription', [
          //   $user,
          //   $e->getMessage()
          // ], 10);
          $obj->message = $e->getMessage();
          return $obj;
      }
    }
    public static function createMonthlySubscription($user, $paymentMethod = null)
    {
        $obj = new stdClass;
        $obj->status = 1;
        $obj->message = "";

        try {
            $planId = self::getMonthlyPlanID();

            if ($paymentMethod) {
                $subscription = $user->newSubscription('main', $planId)
                // ->trialUntil(Carbon::now()->addMinutes(1))
                ->create($paymentMethod);
            } else {
                $subscription = $user->newSubscription('main', $planId)
                // ->trialUntil(Carbon::now()->addMinutes(1))
                ->create();
            }

            $obj->status = 1;
            $obj->subscription = $subscription;

            return $obj;
        } catch (IncompletePayment $exception) {
            $response = redirect()->route(
                  'cashier.payment',
                  [$exception->payment->id, 'redirect' => route('home')]
              );
            $obj->response = $response;
            $obj->status = 3;

            return $obj;
        } catch (\Exception $e) {
            $user->subscription('main')->cancelNow();
            myLog('error while creating subscription', [
              $user,
              $e->getMessage()
            ], 10);
            $obj->message = $e->getMessage();
            return $obj;
        }
    }



















    public static function createMonthlyPlan($options)
    {
        self::init();
        return self::createPlan($options);
    }


    public static function getMonthlyPlanID()
    {
        self::init();
        $stripePlanId = setting('stripePlanId');


        if (self::isPlanExists($stripePlanId)) {
            return $stripePlanId;
        }

        try {
            $plan = self::createMonthlyPlan();
            return $stripePlanId;
        } catch (\Exception $e) {
            return $e;
        }
    }



    public static function getSubscription($subscriptionId)
    {
        self::init();
        return $subscription = StripeSubscription::retrieve($subscriptionId);
    }

    public static function getPlan($planId)
    {
        self::init();
        return StripePlan::retrieve($planId);
    }

    public static function getPlansArray()
    {
        $projectName = "Flex Sited ";

        return $plans = [
        [
          'id'=> 'basicPlanMonthly',
          'amount' => '3995',
          'interval'=> 'month',
          'productName'=> $projectName  . " Monthly Basic Subscription Plan",
        ],
        [
          'id'=> 'basicPlanYearly',
          'amount' => '36000',
          'interval'=> 'year',
          'productName'=> $projectName  . " Basic Subscription Plan",

        ],
        // essential plans
        [
          'id'=> 'essentialPlanMonthly',
          'amount' => '5995',
          'interval'=> 'month',
          'productName'=> $projectName .  " Monthly Essential Subscription Plan",

        ],
        [
          'id'=> 'essentialPlanYearly',
          'amount' => '60000',
          'interval'=> 'year',
          'productName'=> $projectName  . " Yearly Essential Subscription Plan",
        ],

        // Active plans
        [
          'id'=> 'activePlanMonthly',
          'amount' => '7995',
          'interval'=> 'month',
          'productName'=> $projectName  . " Monthly Active Subscription Plan",

        ],
        [
          'id'=> 'activePlanYearly',
          'amount' => '85000',
          'interval'=> 'year',
          'productName'=> $projectName . " Yearly Active Subscription Plan",
        ],
        // Complete plans
        [
          'id'=> 'completePlanMonthly',
          'amount' => '12995',
          'interval'=> 'month',
          'productName'=> $projectName . " Monthly Complete Subscription Plan",

        ],
        [
          'id'=> 'completePlanYearly',
          'amount' => '145000',
          'interval'=> 'year',
          'productName'=> $projectName . " Yearly Complete Subscription Plan",
        ],

      ];
    }
    public static function allPlans()
    {
        try {
            return  StripePlan::all(['limit' => 100]);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public static function isPlanExists($planId)
    {
        try {
            $plan = StripePlan::retrieve($planId);
            if ($plan instanceof StripePlan) {
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }
        return false;
    }


    public static function createCustomer($token, $options)
    {
        self::init();
        try {
            $options['source'] = $token;

            $customer = StripeCustomer::create(
                $options
            );
        } catch (\Exception $e) {
            return $e;
        }

        return $customer;
    }

    public static function chargeCustomer($options)
    {
        $options = array_merge(
            $options,
            [
            'currency' => 'usd',
            'statement_descriptor' => 'Charge At WP'
            ]
        );
        try {
            $charge = StripeCharge::create($options);
        } catch (\Exception $e) {
            return $e;
        }

        return $charge;
    }

    public static function getStripeKey()
    {
        return env('STRIPE_SECRET');
    }

    public static function init()
    {
        $key = env('STRIPE_SECRET');
        if (!self::$isInit) {
            Stripe::setApiKey($key);
        }
    }

    public static function createPlan(array $options)
    {
        self::init();

        try {
            $plan = StripePlan::create(
                $options
            );
            return $plan;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
