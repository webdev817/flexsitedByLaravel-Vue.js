@extends('layouts.supportPortal.master')


@section('body')
<div class="container">
    <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Billing Detail</li>
        </ol>
        <h6 class="slim-pagetitle">Billing Detail</h6>
    </div>
    @include('common.messages')




    <div class="m-0 row  mt-4">


           @foreach ($subscriptions as $subscription)

           <div class="col-12 col-md-5 p-2 ">
               <ul class="list-group list-group-flush shadow-sm">
                   <li class="list-group-item">
                       <span class="float-left">Subscription: </span>
                       <span class="float-right">
                           <strong>
                               Monthly Subscription
                           </strong>
                       </span>
                   </li>
                   <li class="list-group-item">
                       <span class="float-left">Subscription Id: </span>
                       <span class="float-right">{{ $subscription->stripe_id }}</span>
                   </li>
                   <li class="list-group-item">
                       <span class="float-left">Subscription Quantity: </span>
                       <span class="float-right">{{ $subscription->quantity }}</span>
                   </li>

                   <li class="list-group-item">
                       <span class="float-left">Subscription Status: </span>
                       <span class="float-right">
                           @if ($subscription->ended())
                           Cancelled
                           @endif
                           @if ($subscription->onGracePeriod())
                           On Grace Period
                           @endif
                           @if ($subscription->active())
                           Active
                           @endif
                       </span>
                   </li>
                   @if ($subscription->onGracePeriod())
                   <li class="list-group-item">
                       <span class="float-left">Subscription End Date: </span>
                       <span class="float-right">{{ $subscription->ends_at }}</span>
                   </li>
                   @endif



                   @if ($subscription->ended())
                   <li class="list-group-item">
                       <span class="float-left">Subscription Cancelled At: </span>
                       <span class="float-right">
                           {{ $subscription->ends_at }}
                       </span>
                   </li>

                   @else



                   <li class="list-group-item">
                       <span class="float-left">Cancel Subscription: </span>
                       <span class="float-right">
                           <form action="{{ route('cancelSubscription') }}" method="post">
                               @csrf
                               <input type="hidden" name="subscription" value="{{ $subscription->id }}">
                               <input type="hidden" name="cancelNow" value="1">
                               <button type="submit" class="btn btn-danger btn-sm" name="button">Cancel Now</button>
                           </form>
                       </span>
                   </li>

                   @endif
                   <li class="list-group-item">
                       <span class="float-left">View Subscription: </span>
                       <span class="float-right">
                           <a href="{{ route('subscriptionHistory',$subscription->id) }}" class="btn btn-success btn-sm">View</a>
                       </span>
                   </li>
               </ul>

           </div>
           @endforeach


       </div>




</div>

@endsection
