@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                      @include('common.messagesSupport')

                        <div class="col-12 pl-0 mb-3">
                          <h4 class="headingColor">Create New Order</h4>
                        </div>



                        @foreach ($orders as $key => $order)
                          <form  action="{{ route('orders.store', $key) }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="{{ $key }}">
                          <div class="col-12 orderBoxes shadow-sm">
                            <div class="row p-3">

                              <div class="col-xl-2 col-lg-3 col-md-3 col-12">
                                <div class="mb-3 text-center w-100" >
                                  <img class="img-fluid" src="{{ asset($order->img) }}" alt="">
                                </div>
                                <button type="submit" class="btn btn-block btn-primary" name="button">Order Now</button>
                              </div>
                              <div class="col-xl-10 col-lg-9 col-md-9 col-12">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="float-left  headingOrder">
                                      {{ $order->title }}
                                    </div>
                                    <div class="float-right headingOrder">
                                      ${{ $order->price }}
                                    </div>
                                  </div>
                                </div>
                                <p class=" mt-2 mb-3">
                                  {{ $order->description }}
                                </p>

                                <textarea name="description" class="form-control bg-transparent" rows="3" cols="80" placeholder="Add Order Details"></textarea>
                              </div>
                            </div>
                          </div>
                        </form>
                        @endforeach














                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('common.copyBtn')

@endsection

@include('common.loadJS', ['select2'=>true])

@section('js')
  <script type="text/javascript">
    $("#marketingService").select2({
      minimumResultsForSearch: -1,
      placeholder: "Which Service are you interested in?"
  }).val(null).change();
  </script>
@endsection
