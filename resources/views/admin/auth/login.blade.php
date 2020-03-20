<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="{{ myconf('description') }}" />
    <meta name="keywords" content="{{ myconf('keywords') }}">
    <meta name="author" content="{{ myconf('author') }}" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset( 'mawaisnow/able/assets/images/favicon.ico" type="image/x-icon' ) }}">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset( 'mawaisnow/able/assets/fonts/fontawesome/css/fontawesome-all.min.css' ) }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset( 'mawaisnow/able/assets/plugins/animation/css/animate.min.css' ) }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset( 'mawaisnow/able/assets/css/style.css' ) }}">

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>

            <form action="{{ route('adminLoginPost') }}" method="post">

            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    @csrf
                    <h3 class="mb-4">Login</h3>
                    <div class="col-10 offset-1">
                      @if ($errors->any())
                          <div class="alert alert-danger my-5 rounded-0">
                            @foreach ($errors->all() as $error)

                                       {{ $error }} 

                              @break
                            @endforeach
                          </div>
                      @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Email">
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="password">
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                            <label for="checkbox-fill-a1" class="cr"> Save credentials</label>
                        </div>
                    </div>
                    <button class="btn btn-primary shadow-2 mb-4">Login</button>
                    <p class="mb-2 text-muted">Forgot password? <a href="{{ route('password.request') }}">Reset</a></p>
                    {{-- <p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html">Signup</a></p> --}}
                </div>
            </div>
          </form>



        </div>
    </div>

    <!-- Required Js -->
    <script src="{{ asset( 'mawaisnow/able/assets/js/vendor-all.min.js' ) }}"></script><script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset( 'mawaisnow/able/assets/js/pcoded.min.js') }}"></script>

</body>
</html>
