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
              {{ $subscription->title }}
            </a>
          @else
            {{ $subscription->title }}
          @endif
        @else
          {{ $subscription->title }}
        @endif


      @endif


  @endforeach

@elseif (count($invoiceItem))
  @php
    $order = getOrderByInvoiceId($invoice->id);
  @endphp
  @if ($order == null)
    --
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
