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

use Stripe\Coupon as StripeCoupon;

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


    public static function isCouponExists($couponId)
    {
        self::init();
        try {
            $coupon = StripeCoupon::retrieve($couponId);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public static function getCoupon($couponId)
    {
        self::init();
        try {
            $coupon = StripeCoupon::retrieve($couponId);
            return obj(1, "Coupon retrieved successfully", 'coupon', $coupon);
        } catch (\Exception $e) {
            return obj(0, $e->getMessage());
        }
    }
    public static function deleteCoupon($id)
    {
        $result = self::getCoupon($id);
        if ($result->status == 0) {
            return true;
        }
        try {
            $result->coupon->delete();
            return obj(1, 'Deleted coupon');
        } catch (\Exception $e) {
            return obj(0, 'Deleted coupon');
        }
    }
    public static function createCoupon($data)
    {
        self::init();

        $name = $data['code'];
        $id = $data['code'];

        if (self::isCouponExists($id)) {
            return self::getCoupon($id);
        }
        try {
            $coupon = StripeCoupon::create([
          'name' => $name,
          'percent_off' => $data['percentOff'],
          'id' => $id,
          'duration'=>'repeating',
          'currency'=> 'usd',
          'duration_in_months'=> 12,

     
        ]);
            return obj(1, "Coupon created successfully", 'coupon', $coupon);
        } catch (\Exception $e) {
            return obj(0, $e->getMessage());
        }
    }

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


    public static function chargeForFlexSited($stripeChargeAmount, $stripeChargeMessage)
    {
        $user = Auth::user();
        $obj = new stdClass;
        $obj->status = 0;
        try {
            $stripeCharge = $user->invoiceFor("Charge for purchasing $stripeChargeMessage at FLEXSITED.", $stripeChargeAmount);

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
        } catch (\Exception $e) {
            $obj->message = $e->getMessage();
            return $obj;
        }
    }
    public static function subscribeToPlan($user, $planId, $coupon, $planUniqeId = 'main')
    {
        $obj = new stdClass;
        $obj->status = 1;
        $obj->message = "";


        try {
            $couponIdToApply = null;

            if ($coupon != null) {
                if (self::isCouponExists($coupon->code)) {
                    $couponIdToApply = $coupon->code;
                }
            }


            if ($couponIdToApply != null) {
                $subscription = $user->newSubscription($planUniqeId, $planId)
            ->withCoupon($couponIdToApply)
            ->create();
            } else {
                $subscription = $user->newSubscription($planUniqeId, $planId)
            ->create();
            }

            newNoti(1, "new subscription",$user->name . " started a new subscription",
            route('allSubscriptions'), 0);

            $obj->status = 1;
            $obj->subscription = $subscription;

            return $obj;
        } catch (IncompletePayment $exception) {
            $response = redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('incompletePaymentCompleted')]
            );

            $obj->response = $response;
            $obj->exception = $exception;
            $obj->status = 3;

            return $obj;
        } catch (\Exception $e) {

            $obj->status = 0;
            // myLog('error while creating subscription', [
            //   $user,
            //   $e->getMessage()
            // ], 10);
            $obj->message = $e->getMessage();
            return $obj;
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
    public static function deletePlan($planId)
    {
        self::init();
        try {
            $plan = self::getPlan($planId);
            $plan->delete();
            return 1;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public static function getPlanById($planId)
    {
        $plans = self::getPlansArray();
        foreach ($plans as $plan) {
            if ($plan['id'] == $planId) {
                return (object) $plan;
            }
        }
        return null;
    }
    public static function getPlansArray()
    {
        $projectName = "Flexsited ";

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
            'statement_descriptor' => 'Charge At FS'
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
        Stripe::setApiKey($key);

        if (!self::$isInit) {
            Stripe::setApiKey($key);
        }
    }
    public static function createFlexSitedPlan($plan , $durration = 'month')
    {
        $options = [
          'interval_count'=> 1,
          "product" => [
              "name" => $plan->productName
          ],
          "currency" => "usd",
          "nickname"=>  $plan->productName
        ];

        if ($durration == "month") {
          $options['id'] = $plan->stripePlanMonthId;
          $options["interval"] = 'month';
          $options['amount'] = $plan->price * 100;
        }else {
          $options['id'] = $plan->stripePlanYearId;
          $options["interval"] = 'year';
          $options['amount'] = $plan->priceYearly * 100;
        }
        return self::createPlan($options);
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

    public static function getStripeInvoiceById($id)
    {
        self::init();
        try {
            return StripeInvoice::retrieve($id);
        } catch (\Exception $e) {
            storeDataToDisk($e->getMessage());
            return null;
        }
    }
    public static function getInvoice($user, $subscriptionId)
    {
        self::init();
        $stripeCustomerId = $user->stripe_id;
        try {
            $invoices = StripeInvoice::all([
          'customer'=> $stripeCustomerId,
          'subscription'=> $subscriptionId
        ]);
        } catch (\Exception $e) {
            return null;
        }
        $invoice = null;
        foreach ($invoices as $invoice) {
            $invoice = $invoice;
            break;
        }
        if ($invoice == null) {
            return null;
        }
        return new \Laravel\Cashier\Invoice($user, $invoice);
    }
}
