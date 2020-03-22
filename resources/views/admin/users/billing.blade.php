<div class="card-header">
    <h5>Billing</h5>
</div>
<div class="card-block pb-0 pt-0">
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td style="width:30%">Charge Status </td>
                    <td style="width:70%">
                        @if ($wizeredObj->charged == "complete")
                        <a href="{{ route('invoiceDownload', [$wizeredObj->chargeInvoiceId, 'userId'=> $user->id]) }}">View Invoice</a>
                        @elseif ($wizeredObj->charged == "NotNeeded")
                        Not Needed
                        @else
                        -
                        @endif

                    </td>
                </tr>
                <tr>
                    <td style="width:30%">Coupon Used</td>
                    <td style="width:70%">
                        @if ($wizeredObj->couponUsedId == null)
                        No
                        @else
                        <a href="{{ route('coupons.edit', $wizeredObj->couponUsedId) }}">
                            Yes
                        </a>
                        @endif
                    </td>
                </tr>

                @if ($user->hasStripeId())

                @php
                $subscription = $user->subscription('main');
                @endphp

                @if ($subscription == null)
                <tr>
                    <td> Subscription:</td>
                    <td>No</td>
                </tr>

                @else



                @if ($subscription->onGracePeriod())
                <tr>
                    <td> Subscription:</td>
                    <td>Cancelled - (Grace Period)</td>
                </tr>
                <tr>
                    <td>Subscription End Date:</td>
                    <td>{{ $subscription->ends_at->format('F d, Y') }}</td>
                </tr>

                <tr>
                    <td>Resume Subscription:</td>
                    <td>
                        <form action="{{ route('resumeSubscription') }}" method="post">
                            @csrf
                            <input type="hidden" name="subscription" value="{{ $subscription->id }}">
                            <button type="submit" class="btn btn-success btn-sm" name="button">Resume</button>
                        </form>
                    </td>
                </tr>

                @elseif ($subscription->ended())
                <tr>
                    <td>Subscription:</td>
                    <td>
                        Cancelled
                    </td>
                </tr>

                @elseif ($subscription->hasIncompletePayment())
                <tr>
                    <td>Subscription:</td>
                    <td>
                        Require Secondary Payment Action
                    </td>
                </tr>
                @elseif ($subscription->active())
                <tr>
                    <td>Subscription:</td>
                    <td>
                        Active
                    </td>
                </tr>
                <tr>
                    <td>Next Billing Date:</td>
                    <td>
                        @php
                        $stripeSubscription = $subscription->asStripeSubscription();

                        @endphp
                        {{ Carbon\Carbon::createFromTimeStamp($stripeSubscription->current_period_end)->format('F jS, Y') }}
                    </td>
                </tr>
                <tr>
                    <td>Stripe Customer ID:</td>
                    <td>
                        {{ $user->stripe_id }}
                    </td>
                </tr>

                <tr>
                    <td>Stripe Subscription ID:</td>
                    <td>
                        {{ $subscription->stripe_id }}
                    </td>
                </tr>
                <tr>
                    <td>View Detail:</td>
                    <td>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('subscriptionHistory', $subscription->id) }}">
                            View
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Cancel Subscription:</td>
                    <td>
                        <form action="{{ route('cancelSubscription') }}" method="post">
                            @csrf
                            <input type="hidden" name="subscription" value="{{ $subscription->id }}">
                            <input type="hidden" name="cancelNow" value="1">
                            <button type="submit" class="btn btn-outline-danger btn-sm" name="button">Cancel Now</button>
                        </form>
                    </td>
                </tr>

                @endif
                @endif



                @else

                <tr>
                    <td> Subscription:</td>
                    <td>No</td>
                </tr>
                @endif


            </tbody>
        </table>
    </div>
</div>


<div class="card-header">
    <h5>Order Total</h5>
</div>
<div class="card-header">
  <div class="table-responsive">
      <table class="table">
          <tbody>
        <tr>
          <td style="width:30%">
            Amount
          </td style="width:70%">

          <td>
            @php
            $totalAmount = 0;
            if ($user->hasStripeId() && $subscription != null) {
              $subscription = $user->subscription('main');
              $invoice = StripeHelper::getInvoice($user, $subscription->stripe_id, 1);
              $totalAmount = $invoice->rawTotal();
            }



            if ($wizeredObj->charged == "complete") {
              $chargeInvoice = $user->findInvoice($wizeredObj->chargeInvoiceId);
              if ($chargeInvoice != null) {
                $totalAmount = $totalAmount + $chargeInvoice->rawTotal();
              }
            }

            @endphp


            <strong>
              ${{ $totalAmount }}
            </strong>
          </td>
        </tr>
      </tbody>
      </table>
  </div>
</div>
