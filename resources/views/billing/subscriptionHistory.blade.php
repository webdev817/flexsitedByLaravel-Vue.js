@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">

                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminHome') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('allSubscriptions') }}">Subscriptions</a></li>
                                    <li class="breadcrumb-item">Billing Detail</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                  $user = $subscription->owner;
                @endphp

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="row">



                            <div class="col-xl-8 col-lg-12">
                                <div class="card">
                                  <div class="card-header">
                                        <h5>Plan</h5>
                                    </div>

                                    @php
                                    $plan = null;
                                      try {
                                        $plan = StripeHelper::getPlan($subscription->stripe_plan);
                                      } catch (\Exception $e) {

                                      }


                                    @endphp
                                    @if ($plan != null)

                                      <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:30%">ID</td>
                                                        <td style="width:70%">{{ $plan->id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td >Interval</td>
                                                        <td class="text-capitalize">{{ $plan->interval }}</td>
                                                    </tr>
                                                    <tr>
                                                      <td>Description</td>
                                                      <td  class="text-capitalize">{{  $plan->nickname }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                    @endif
                                    <div class="card-header">
                                          <h5>Billing History</h5>
                                      </div>

                                    <div class="card-block p-0">

                                      @if ($subscription->onGracePeriod())
                                      <div class="alert alert-danger text-center">
                                          You have cancelled your subscription.<br>
                                          You have access until {{ $subscription->ends_at->format('F d, Y') }}.
                                          If you want to continue using {{ config('mawaisnow.title') }} please resume your subscription now.
                                          <br>
                                          <form action="{{ route('resumeSubscription') }}" method="post">
                                              @csrf
                                              <input type="hidden" name="subscription" value="{{ $subscription->id }}">
                                              <button type="submit" class="btn btn-success btn-sm" name="button">Resume</button>
                                          </form>

                                      </div>
                                      @endif
                                      @if ($subscription->ended())
                                      <div class="bg-dark jumbotron text-center text-white">
                                          <p>Subscription was cancelled.</p>
                                      </div>

                                      @endif


                                      @if (count($invoices) > 0)
                                      <table class="table table-bordered m-0 m-0 p-0">
                                          <tr>

                                              <th>Date</th>
                                              <th>Amount</th>
                                              <th>Invoice Id</th>
                                              <th>Action</th>
                                          </tr>
                                          @foreach ($invoices as $key => $invoice)

                                          <tr>

                                              <td>{{ $invoice->date()->toFormattedDateString() }}</td>

                                              <td>{{ $invoice->total() }}</td>
                                              <td>{{ $invoice->id }}</td>
                                              <td class="col-xs-2 ">
                                                  <a href="{{ route('invoiceDownload',[$invoice->id,
                                                        'userId'=>$subscription->user->id
                                                        ]) }}" class="btn btn-primary btn-sm">Download</a>
                                              </td>
                                          </tr>
                                          @endforeach
                                      </table>
                                      @else
                                      <div class="jumbotron text-center">
                                          <p>No billing history</p>
                                      </div>
                                      @endif

                                    </div>


                                </div>

                                @if ($upcomingInvoice != null)

                                <div class="card">
                                  <div class="card-header">
                                        <h5>Upcoming Invoice</h5>
                                    </div>
                                  <div class="card-block">

                                    <div class="">
                                        <div class=" list-group list-group-flush">


                                            <li class="list-group-item">
                                                Amount: <span class="float-right">{{ $upcomingInvoice->total() }}</span>
                                            </li>

                                            <li class="list-group-item">
                                                Start Date: <span class="float-right">
                                                    {{ unixtoDate($upcomingInvoice->period_start) }}
                                                </span>
                                            </li>


                                            <li class="list-group-item">
                                                Next Billing Date: <span class="float-right">
                                                    {{ $upcomingInvoice->date()->toFormattedDateString() }}

                                                </span>
                                            </li>
                                            <li class="list-group-item">
                                                Subscription Id: <span class="float-right">
                                                    {{ $upcomingInvoice->subscription }}
                                                </span>
                                            </li>
                                            <li class="list-group-item">
                                                Customer Id: <span class="float-right">
                                                    {{ $upcomingInvoice->customer }}
                                                </span>
                                            </li>



                                          @if ($subscription->active())

                                            <li class="list-group-item">
                                                    Cancel Subscription:
                                                    <div class="float-right">
                                                      <form action="{{ route('cancelSubscription') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="subscription" value="{{ $subscription->id }}">
                                                        <input type="hidden" name="cancelNow" value="1">
                                                        <button type="submit" class="btn btn-danger btn-sm" name="button">Cancel Now</button>
                                                      </form>
                                                    </div>
                                            </span>
                                            </li>
                                          @endif


                                        </div>

                                    </div>
                                  </div>
                                </div>
                              @endif



                            </div>



                            <div class="col-xl-4 col-lg-12">

                                <div class="card">
                                    <div class="text-center project-main">
                                        <a href="{{ route('users.show',$user->id) }}">
                                            <img src="{{ asset('mawaisnow\slim\img\avatar_11.png') }}" class="img-radius img-fluid rounded-circle" alt="User-Profile-Image">
                                        </a>

                                        <h5 class="mt-4">{{ $user->name }}</h5>
                                        @if ($user->businessName != null)
                                        <span>{{ $user->businessName }}</span>

                                        @endif

                                    </div>


                                    <div class="card-block task-details pt-0 pb-0">

                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><i class="fas fa-id-badge m-r-5"></i> ID:</td>
                                                    <td class="text-right"><span class="float-right"> {{ $user->id }} </span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-envelope m-r-5"></i> Email:</td>
                                                    <td class="text-right"><span class="float-right"> {{ $user->email }} </span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-phone m-r-5"></i> Phone:</td>
                                                    <td class="text-right"><span class="float-right"> {{ $user->phone }} </span></td>
                                                </tr>

                                                <tr>
                                                    <td><i class="fas fa-thermometer-half m-r-5"></i> Status:</td>
                                                    <td class="text-right">
                                                        @if ($user->status == 0) Pending
                                                        @endif
                                                        @if ($user->status == 1) Active
                                                        @endif
                                                        @if ($user->status == 2) Block
                                                        @endif
                                                    </td>
                                                </tr>










                                                <tr>
                                                    <td><i class="far fa-calendar-alt m-r-5"></i> Updated:</td>
                                                    <td class="text-right">{{ $user->updated_at->format('d F, Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="far fa-credit-card m-r-5"></i> Created:</td>
                                                    <td class="text-right">{{ $user->created_at->format('d F, Y') }}</td>
                                                </tr>



                                                <tr>
                                                    <td><i class="fa-pencil-alt fas m-r-5"></i> Edit:</td>
                                                    <td class="text-right">
                                                      <a href="{{ route('users.edit',$user->id) }}" class="btn btn-outline-success btn-sm ">Yes</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                  <td><i class="far fa-trash-alt m-r-5"></i> Delete:</td>

                                                  <td  class="text-right">
                                                    <a href="javascript:void(0)" data-obj='{
                                                      "userId": "{{$user->id}}",
                                                      "url": "{{ route('users.destroy', $user->id) }}",
                                                      "method": "delete"
                                                    }' data-html="Once you delete this user, all of it's related Data will be deleted, including subscription." class=" btn-sm btn btn-outline-danger label f-12 deleteConfirm">Yes</a>
                                                  </td>
                                                </tr>


                                            </tbody>
                                        </table>

                                    </div>
                                </div>




                            </div>




                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('jsCommon')
  @include('common.js')
@endsection
