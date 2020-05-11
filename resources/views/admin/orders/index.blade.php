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
                      @include('common.messagesSupport')

                        <!-- [ Main Content ] start -->
                        <div class="row">

                            <div class="col-12">

                                <div class="bg-white mg-t-20 mg-sm-t-30">

                                    <div class="table-responsive">
                                        <table class="table mg-b-0 tx-13">
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                <tr>

                                                    <td>
                                                        <a href="{{ route('orderEdit', $order->id) }}">
                                                            <span class="text-capitalize">{{ $order->title }}</span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        ${{ $order->price }}
                                                    </td>
                                                    <td>
                                                      <img src="{{ asset($order->img) }}" class="img-fluid" alt="">
                                                    </td>
                                                    <td>
                                                        {{ $order->description }}
                                                    </td>

                                                </tr>
                                                @endforeach





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

@section('head')
<script src="{{ asset('mawaisnow/slim/lib/select2/js/select2.full.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('mawaisnow/slim/lib/select2/css/select2.min.css') }}">

@endsection
@section('js')

@endsection
