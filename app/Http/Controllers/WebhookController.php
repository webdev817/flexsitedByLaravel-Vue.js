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
use Stripe\Stripe;
use StripeHelper;
use Helper;


class WebhookController extends CashierController
{

    public function handleChargeSucceeded($payload)
    {


        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {


        }

    }



    public function handleInvoicePaymentSucceeded($payload)
    {
        // storeDataToDisk($payload);
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {

         
          $invoiceId = $payload['data']['object']['id'];

          $invoice = StripeHelper::getStripeInvoiceById($invoiceId);

          $laravelInvoice = new \Laravel\Cashier\Invoice($user, $invoice);

          sendInvoicePaidEmail([
            'email'=> $user->email,
            'user'=> $user,
            'invoice'=> $laravelInvoice
            ]);

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
