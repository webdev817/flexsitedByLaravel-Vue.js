<div class="modal" id="model{{$user->id}}">
    <div class="modal-dialog" style="width:80%;max-width:100%;">
        <div class="modal-content bgWTP" style="width:100% !important">

            <!-- Modal Header -->
            <div class="modal-header" style="padding: 8px 19px">
                <h4 class="modal-title">
                  {{ $user->name }}  Subscriptions
                </h4>
                <button type="button" class="close" class="btn-primary" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

              <div class="row">
                @foreach ($user->subscriptions as $subscription)
                <ul class="list-group list-group-flush mb-3 col-6">
                    
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
                            <strong class="text-danger">Cancelled</strong>
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
                    @if ($subscription->onGracePeriod())
                    <li class="list-group-item">
                        <span class="float-left">Resume Subscription: </span>
                        <span class="float-right">
                            <form action="{{ route('resumeSubscription') }}" method="post">
                                @csrf
                                <input type="hidden" name="subscription" value="{{ $subscription->id }}">
                                <button type="submit" class="btn btn-primary btn-sm" name="button">Resume</button>
                            </form>
                        </span>
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


                    {{-- display cancel button if super admin and package is employee --}}

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
                            <a href="{{ route('subscriptionHistory',$subscription->id) }}" class="btn btn-primary btn-sm">View</a>
                        </span>
                    </li>
                </ul>
                @endforeach


            </div>

          </div>


        </div>
    </div>
</div>
