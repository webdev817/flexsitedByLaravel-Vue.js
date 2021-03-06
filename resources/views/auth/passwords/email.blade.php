@extends('layouts.auth')
@section('body')
<div class="container p-0 shadow-sm noneShadowOn576Below">

    <div class="row m-0">
        <div class="col-12 prelative p-0">
            <img src="{{ asset('mawaisnow/img/authbg.png') }}" alt="" class="img-fluid w-100 noselect">
            <img src="{{ asset('mawaisnow/logo/FLEXSITED.png') }}" alt="" class="authLogo noselect">

            {{-- <div class="row authNavContainer">
                <div class="col-12  authNavItem"  onclick="window.location = '{{ route('register') }}'">
                    REGISTER ACCOUNT
                </div>
                <div class="col-6  authNavItem " onclick="window.location = '{{ route('login') }}'">
                    LOGIN TO ACCOUNT
                </div>
            </div> --}}
        </div>
    </div>
    <div class="row bg-white m-0">
        <div class="col-12 text-center favColor my-3 py-3">
            <h4>Reset Password</h4>
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
  <form method="POST" action="{{ route('password.email') }}">
    <div class="row bg-white pb-5 mx-0">
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





            <div class="col-10 offset-1 my-3">
                <button type="submit" class="btn btn-block btn-cstm btn-lg rounded-0 shadow-none" name="button">Send Password Reset Link</button>
            </div>
            <div class="col-12 text-center">
              <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Create Account</a>
            </div>

    </div>
  </form>


</div>

@endsection
