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
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <div class="col-12 card bg-white p-3">


                                @include('common.messages')

                                <form action="{{ route('orderEditStore', $order->id) }}" method="post" enctype="multipart/form-data" id="payment-form">
                                    @csrf
                                    {{-- <input type="hidden" name="_method" value="PUT"> --}}

                                    <div class="section-wrapper">

                                        <div class="form-layout">

                                            <div class="row mb-4">

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label w-100" for="title">Title: <span class="tx-danger">*</span> </label>
                                                        <input class="form-control" type="text" id="title" required name="title" value="{{ $order->title }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label  w-100" for="price">Price: <span class="tx-danger">*</span> </label>
                                                        <input class="form-control" type="text" id="price" required name="price" value="{{ $order->price }}">
                                                    </div>
                                                </div>


                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label  w-100" for="priceYearly">Description: <span class="tx-danger">*</span> </label>
                                                         <textarea name="description" class="form-control" required rows="8" cols="80">{{ $order->description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                  <label class="form-control-label  w-100" for="price">Image:  </label>
                                                  <input type="text" onclick="$('#fileInput').click()" class="form-control" placeholder="" name="fileName" id="filechoosed" value="">
                                                  <input onchange="showthefilename(this, 'filechoosed','Please Attach File (Optional)')" type="file" class="d-none" id="fileInput" name="file" value="">
                                                </div>










                                            </div>







                                            <div class="form-layout-footer submitSection">

                                                <button type="submit" id="submitButton" class="btn btn-primary " name="button">Update</button>


                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
