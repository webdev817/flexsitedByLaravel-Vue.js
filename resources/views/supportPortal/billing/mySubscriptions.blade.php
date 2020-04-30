@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="row">



                            <div class="col-md-12">
                                <div class="card user-list">
                                    <div class="card-header">
                                        <h5>Subscriptions</h5>
                                        
                                    </div>
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Detail</th>
                                                        <th>Status</th>
                                                        <th>Plan</th>
                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($subscriptions as $subscription)

                                                    <tr>

                                                        <td>
                                                            {{ $subscription->stripe_id }}
                                                        </td>

                                                        <td>
                                                          @if ($subscription->name == "main")
                                                            Main Website Subscription
                                                          @else
                                                            @php
                                                            $order =  getOrderById($subscription->name);
                                                            @endphp
                                                            @if ($order->project != null && $order->project->status != 1)
                                                              <a href="{{ route('projects.show', $order->project->id ) }}">{{ $order->project->title }}</a>
                                                            @endif
                                                          @endif
                                                        </td>
                                                        <td>
                                                            @if ($subscription->ended())
                                                            Cancelled
                                                            @endif
                                                            @if ($subscription->onGracePeriod())
                                                            On Grace Period
                                                            @endif
                                                            @if ($subscription->active())
                                                            Active
                                                            @endif
                                                        </td>

                                                        <td>

                                                          @php
                                                            $plan = StripeHelper::getPlanById($subscription->stripe_plan);
                                                          @endphp

                                                          @php dd(
                                                            $plan

                                                            )  @endphp




                                                        </td>



                                                        <td>
                                                            <a href="{{ route('subscriptionHistory',$subscription->id) }}" class="btn btn-success btn-sm">View</a>
                                                        </td>
                                                        {{-- <td>
                                                          <a href="{{ route('clientOnBoarding',$user->id) }}" class="label theme-bg text-white f-12"><i class="fas fa-eye text-white"></i> View</a>
                                                        <a href="{{ route('users.edit', $user->id) }}" class="label theme-bg text-white f-12"><i class="fa-pencil-alt fas text-white"></i> Edit</a>
                                                        <a href="javascript:void(0)" data-obj='{
                                                            "userId": "{{$user->id}}",
                                                            "url": "{{ route('users.destroy', $user->id) }}",
                                                            "method": "delete"
                                                          }' data-html="Once you delete this user, all of it's related Data will be deleted, including subscription." class="label theme-bg2 text-white f-12 deleteConfirm"><i
                                                              class="fas fa-trash text-white"></i> Delete</a>

                                                        </td> --}}
                                                    </tr>
                                                    @endforeach
                                                    @if ($subscriptions->count() < 1) <tr>
                                                        <td colspan="7" class="text-center">
                                                            <h3>No Records</h3>
                                                        </td>
                                                        </tr>
                                                        @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if ($subscriptions->total() > $subscriptions->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">
                                            {!! $subscriptions->links() !!}
                                        </div>
                                    </div>
                                    @endif


                                </div>
                            </div>


                        </div>
                        <!-- [ Main Content ] end -->
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
