@extends('layouts.auth')
@section('body')
<div class="container p-0 shadow-sm">

    <div class="row m-0">
        <div class="col-12 prelative p-0">
            <img src="{{ asset('mawaisnow/img/authbg.png') }}" alt="" class="img-fluid w-100 noselect">
            <img src="{{ asset('mawaisnow/logo/FLEXSITED.png') }}" alt="" class="authLogo noselect">

            <div class="row authNavContainer">
                <div class="col-6  authNavItem" onclick="window.location = '{{ route('register') }}'">
                    REGISTER ACCOUNT
                </div>
                <div class="col-6  authNavItem authNavItemInActive" onclick="window.location = '{{ route('login') }}'">
                    LOGIN TO ACCOUNT
                </div>
            </div>
        </div>
    </div>
    <div class="row bg-white m-0">
        <div class="col-12 text-center favColor py-3">
            {{-- <h4>Register Your Account</h4> --}}
        </div>
        <div class="col-10 offset-1">
            @if ($errors->any())
            <div class="alert alert-danger my-5 rounded-0">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    <form method="POST" action="{{ route('register') }}">
        <div class="row bg-white mb-5 pb-5 mx-0">
            @csrf

            <div class="col-10 offset-1">
                <div class="input-group mb-3 border">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <img src="{{ asset('mawaisnow/img/auth/user.png') }}" class="noselect" alt="">
                        </span>
                    </div>
                    <input value="{{ old('name') }}" name="name" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1" required>
                </div>
            </div>


            <div class="col-10 offset-1">
                <div class="input-group mb-3 border">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">
                            <img src="{{ asset('mawaisnow/img/auth/email.png') }}" class="noselect" alt="">
                        </span>
                    </div>
                    <input value="{{ old('email') }}" name="email" type="email" class="border-0 form-control shadow-none cstmFormControl" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" required>
                </div>
            </div>

            <div class="col-10 offset-1">
                <div class="input-group mb-3 border">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">
                            <img src="{{ asset('mawaisnow/img/auth/password.png') }}" class="noselect" alt="">
                        </span>
                    </div>
                    <input value="{{ old('phone') }}" name="phone" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="basic-addon3" required>
                </div>
            </div>

            <div class="col-10 offset-1">
                <div class="input-group mb-3 border">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon4">
                            <img src="{{ asset('mawaisnow/img/auth/business-name.png') }}" class="noselect" alt="">
                        </span>
                    </div>
                    <input value="{{ old('businessName') }}" name="businessName" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Business Name" aria-label="Business Name" aria-describedby="basic-addon4" required>
                </div>
            </div>

            <div class="col-10 offset-1">
                <div class="input-group mb-3 border">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon5">
                            <img src="{{ asset('mawaisnow/img/auth/password.png') }}" class="noselect" alt="">
                        </span>
                    </div>
                    <input value="{{ old('password') }}" name="password" type="password" class="border-0 form-control shadow-none cstmFormControl" placeholder="Password" aria-label="Password" aria-describedby="basic-addon5" required>
                </div>
            </div>


            <div class="col-10 offset-1">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if(old('agree') == 1) checked
                    @endif value="1" class="custom-control-input" name="termsandConditions" id="agree" required>
                    <label class="custom-control-label" for="agree">
                        By creating this account, you agree to the <a href="{{ route('termsOfService') }}">Terms and Conditions</a> and
                        <a href="{{ route('privacyPolicya') }}">Privacy Policy.</a>

                    </label>
                </div>
            </div>

            <div class="col-10 offset-1 my-3">
                <button type="submit" class="btn btn-block btn-cstm btn-lg rounded-0 shadow-none" name="button">Create account</button>
            </div>

        </div>
    </form>


</div>

@endsection
