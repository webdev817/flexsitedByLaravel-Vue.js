<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') . '?ver='. date('ymdhis') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') . '?ver='. date('ymdhis') }}" rel="stylesheet">

    @yield('css')
    @yield('head')
</head>
<body>
  @yield('body')
  <div class="container p-0 shadow-sm">

    <div class="row m-0">
      <div class="col-12 prelative p-0">
        <img src="{{ asset('mawaisnow/img/authbg.png') }}" alt="" class="img-fluid w-100 noselect">
        <img src="{{ asset('mawaisnow/logo/FLEXSITED.png') }}" alt="" class="authLogo noselect">

        <div class="row authNavContainer">
          <div class="col-6  authNavItem">
            REGISTER ACCOUNT
          </div>
          <div class="col-6  authNavItem authNavItemInActive">
            LOGIN TO ACCOUNT
          </div>
        </div>
      </div>
    </div>
    <div class="row bg-white m-0">
      <div class="col-12 text-center favColor my-5 py-3">
        <h4>Register Your Account</h4>
      </div>
    </div>
    <div class="row bg-white mb-5 pb-5 mx-0">

      <div class="col-10 offset-1">
        <div class="input-group mb-3 border">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('mawaisnow/img/auth/user.png') }}" class="noselect" alt="">
              </span>
            </div>
            <input type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1" required>
        </div>
      </div>


      <div class="col-10 offset-1">
        <div class="input-group mb-3 border">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon2">
                <img src="{{ asset('mawaisnow/img/auth/email.png') }}" class="noselect" alt="">
              </span>
            </div>
            <input type="email" class="border-0 form-control shadow-none cstmFormControl" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" required>
        </div>
      </div>

      <div class="col-10 offset-1">
        <div class="input-group mb-3 border">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">
                <img src="{{ asset('mawaisnow/img/auth/password.png') }}" class="noselect" alt="">
              </span>
            </div>
            <input type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="basic-addon3" required>
        </div>
      </div>

      <div class="col-10 offset-1">
        <div class="input-group mb-3 border">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon4">
                <img src="{{ asset('mawaisnow/img/auth/business-name.png') }}" class="noselect" alt="">
              </span>
            </div>
            <input type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Business Name" aria-label="Business Name" aria-describedby="basic-addon4" required>
        </div>
      </div>

      <div class="col-10 offset-1">
        <div class="input-group mb-3 border">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon5">
                <img src="{{ asset('mawaisnow/img/auth/password.png') }}" class="noselect" alt="">
              </span>
            </div>
            <input type="password" class="border-0 form-control shadow-none cstmFormControl" placeholder="Password" aria-label="Password" aria-describedby="basic-addon5" required>
        </div>
      </div>


      <div class="col-10 offset-1">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="termsandConditions" id="agree" required>
          <label class="custom-control-label" for="agree">By creating this account, you agree to the terms and conditions and Privacy Policy.</label>
        </div>
      </div>

      <div class="col-10 offset-1 my-3">
        <button type="submit" class="btn btn-block btn-cstm btn-lg rounded-0 shadow-none" name="button">Create account</button>
      </div>

    </div>


  </div>



    @yield('js')

</body>
</html>
