@extends('layouts.supportPortal.master')
<style type="text/css">
    .table{
        text-align: center;
    }
</style>
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
                                                    <th>Plan</th>
                                                    <th>Per Month Price</th>
                                                    <th>Per Month For Year</th>
                                                    <th>Per Year Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($plans as $plan)
                                                <tr>

                                                    <td>
                                                        <a href="{{ route('plans.edit', $plan->id) }}">
                                                            <span class="text-capitalize">{{ $plan->name }}</span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        ${{ $plan->price }}
                                                    </td>
                                                    <td>
                                                        ${{ $plan->priceYearlyMonthly }}
                                                    </td>
                                                    <td>
                                                        ${{ $plan->priceYearly }}
                                                    </td>

                                                </tr>
                                                @endforeach

                                                @if ($plans->count() < 1)
                                                   <tr>
                                                      <td colspan="6" class="text-center">
                                                        <h1>No Records</h1>
                                                      </td>
                                                   </tr>
                                                @endif



                                            </tbody>
                                        </table>
                                    </div>




                                </div>

                            </div>
                        </div>
                                               
                        <div class="row">
                            <div class="col-12 mt-4" style="text-align: center;">
                                <h4>ADD ON</h4>
                                <div class="bg-white mg-t-20 mg-sm-t-30">
                                    <div class="table-responsive">
                                        <table class="table mg-b-0 tx-13">
                                            <thead>
                                                <tr>
                                                    <th>Logo Design</th>
                                                    <th>Business Card Design</th>
                                                    <th>Flyer Design</th>
                                                    <th>Social Media Design </th>
                                                    <th>Price Change</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        ${{ $addon->logoDesignPrice }}
                                                    </td>
                                                    <td>
                                                        ${{ $addon->cardDesignPrice }}
                                                    </td>
                                                    <td>
                                                        ${{ $addon->flyerDesignPrice }}
                                                    </td>
                                                    <td>
                                                        ${{$addon->socialMediaDesignPrice}}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('addonEdit',$addon->id) }}" class="btn btn-primary ">change</a>         
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

@section('head')
<script src="{{ asset('mawaisnow/slim/lib/select2/js/select2.full.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('mawaisnow/slim/lib/select2/css/select2.min.css') }}">

@endsection
@section('js')

@endsection
