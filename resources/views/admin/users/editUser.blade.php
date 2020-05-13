@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">



                <div class="main-body">
                    <div class="page-wrapper">

                        @include('common.messages')

                        <div class="row">

                            <div class="col-12">



                                <div class="card user-list">
                                    <div class="card-header">
                                        <h5>Edit User</h5>

                                    </div>
                                    <form class="" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                        <div class="card-block row m-0 pl-0 pr-0">

                                            @csrf
                                            {{ method_field('put') }}

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="name">Name: <span class="text-danger">*</span> </label>
                                                    <input class="form-control" type="text" id="name" name="name" value="{{ $user->name ?? old('name') }}" required="required">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="businessName">Business Name: <span class="text-danger">*</span> </label>
                                                    <input class="form-control" type="text" id="businessName" name="businessName" value="{{ $user->businessName ?? old('businessName') }}" required="required">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="Phone">Phone: <span class="text-danger">*</span> </label>
                                                    <input class="form-control" type="text" id="Phone" name="phone" value="{{ $user->phone ?? old('phone') }}" required="required">
                                                </div>
                                            </div>

                                            @if (superAdmin())

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="status">Status: </label>
                                                    <select class="form-control" name="status" id="status" required>
                                                        <option value="2" @if($user->status == 2) selected
                                                        @endif >Close</option>
                                                        <option value="1" @if($user->status == 1) selected
                                                            @endif >Active</option>
                                                        <option value="0" @if($user->status == 0) selected
                                                            @endif >InActive</option>
                                                    </select>
                                                </div>
                                            </div>
                                          @endif

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="password">Password: </label>
                                                    <input class="form-control" type="password" id="password" name="password" value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="password_confirm">Confirm Password: <span class="tx-danger">*</span> </label>
                                                    <input class="form-control" type="password" id="password_confirm" name="password_confirm" value="">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-4">
                                              <input type="text" onclick="$('#fileInput').click()" class="form-control" placeholder="Profile Picture"  id="filechoosed" value="">
                                              <input onchange="showthefilename(this, 'filechoosed','Profile Picture')" accept="image/*" type="file" class="d-none" id="fileInput" name="image" value="">
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary" name="button">Update</button>
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
</div>

@endsection


@section('jsCommon')
@include('common.js')
@endsection
