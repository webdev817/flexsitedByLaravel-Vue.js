<?php

namespace App\Http\Controllers;

use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Laravel\Cashier\Http\Middleware\VerifyWebhookSignature;
use Laravel\Cashier\Payment;
use Laravel\Cashier\Subscription;
use Stripe\PaymentIntent as StripePaymentIntent;
use Symfony\Component\HttpFoundation\Response;
use Helper;


class WebhookController extends CashierController
{

    public function handleChargeSucceeded($payload)
    {


        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {


            $invoiceId = $payload['data']['object']['invoice'];

            //check if charge is non SUbscription charge
            if ($invoiceId == null) {

            }

        }

    }



    public function handleInvoicePaymentSucceeded($payload)
    {
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {

        }

    }


    public function handleChargeFailed($payload)
    {
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
            sendPaymentFailedEmail(
                [
                'email'=>$user->email,
                'user'=>$user
                ]
            );
        }
    }




}
