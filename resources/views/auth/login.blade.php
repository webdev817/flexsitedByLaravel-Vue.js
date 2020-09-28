@extends('layouts.auth')
@section('body')
<div class="container p-0 shadow-sm noneShadowOn576Below">

    <div class="row m-0">
        <div class="col-12 hero prelative p-0">
            
            <img src="{{ asset('mawaisnow/logo/FLEXSITED.png') }}" alt="" class="authLogo noselect">

            <div class="row authNavContainer">
                <div class="col-6  authNavItem authNavItemInActive"  onclick="window.location = '{{ route('register') }}'">
                    REGISTER ACCOUNT
                </div>
                <div class="col-6  authNavItem " onclick="window.location = '{{ route('login') }}'">
                    LOGIN TO ACCOUNT
                </div>
            </div>
        </div>
    </div>
    <div class="row bg-white m-0">
        <div class="col-12 text-center favColor py-3">
            {{-- <h4>Account Login</h4> --}}
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
    <div class="row bg-white m-0">

        <div class="col-10 text-center offset-1">
          @if (Session::has('status'))
              <div class="alert text-center  rounded-0">
                  <ul class="m-0 p-0 text-center">
                    {{ Session::get('status') }}
                  </ul>
              </div>
          @endif
        </div>
    </div>
    <form method="POST" action="{{ route('login') }}">
    <div class="row bg-white  pb-5 mx-0">
            @csrf




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
                        <span class="input-group-text" id="basic-addon5">
                            <img src="{{ asset('mawaisnow/img/auth/password.png') }}" class="noselect" alt="">
                        </span>
                    </div>
                    <input value="{{ old('password') }}" name="password" type="password" class="border-0 form-control shadow-none cstmFormControl" placeholder="Password" aria-label="Password" aria-describedby="basic-addon5" required>
                </div>
            </div>
            <div class="col-10 offset-1">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="Remember" id="Remember">
                    <label class="custom-control-label" for="Remember">
                        Remember me
                    </label>
                </div>
            </div>
            <div class="col-10 offset-1 my-3">
                <button type="submit" class="btn btn-block btn-cstm btn-lg rounded-0 shadow-none" name="button">Login</button>
            </div>
            <div class="col-12 text-center">
              <a href="{{ route('password.request') }}">Forgot Password</a> or <a href="{{ route('register') }}">Create Account</a>
            </div>

    </div>
  </form>


</div>

@endsection
