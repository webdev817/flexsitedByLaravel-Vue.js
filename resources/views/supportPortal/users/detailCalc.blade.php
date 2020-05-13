@php
$subscriptionItems = $invoice->subscriptions();

$invoiceItem = $invoice->invoiceItems();
@endphp

@if (count($subscriptionItems))
  @foreach ($subscriptionItems as $item)

      @php
      $subscription = getSubscription(Auth::id(), $item->subscription);
      @endphp
      @if ($subscription == null)
      --
      @else




        @if ($subscription->order != null)
          
          @if ($subscription->order->project != null && $subscription->order->project->status != 1)
            <a href="{{ route('projects.show',$subscription->order->id) }}">
              {{ getPlanByStripePlanId($subscription->stripe_plan)->title }}
            </a>
          @else
            {{ getPlanByStripePlanId($subscription->stripe_plan)->title }}
          @endif
        @else
          {{ getPlanByStripePlanId($subscription->stripe_plan)->title }}
        @endif


      @endif


  @endforeach

@elseif (count($invoiceItem))
  @php
    $order = getOrderByInvoiceId($invoice->id);
  @endphp
  @if ($order == null)
    Order Charges
  @else
    @if ($order->project != null && $order->project->status != 1)
      <a href="{{ route('projects.show',$order->id) }}">
        {{ $order->title }}
      </a>
    @else
      {{ $order->title }}
    @endif

  @endif
@endif
