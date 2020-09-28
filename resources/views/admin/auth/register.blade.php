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
<body>
    <div class="auth-wrapper">
        <div class="auth-content " style="width: 35%; min-width:360px;">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
				
            <form action="{{ route('adminRegisterCreate') }}" method="post">
	            <div class="card">
	                <div class="card-body text-center">
	                    @csrf
	                    <h3 class="mb-4">New Administrator</h3>
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

	                    <div class="input-group mb-3 border">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text" id="basic-addon1">
		                            <img src="{{ asset('mawaisnow/img/auth/user.png') }}" class="noselect" alt="">
		                        </span>
		                    </div>
			                    <input value="{{ old('name') }}" name="name" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1" required>
			            </div>
		                <div class="input-group mb-3 border">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text" id="basic-addon2">
		                            <img src="{{ asset('mawaisnow/img/auth/email.png') }}" class="noselect" alt="">
		                        </span>
		                    </div>
		                    <input value="{{ old('email') }}" name="email" type="email" class="border-0 form-control shadow-none cstmFormControl" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" required>
		                </div>
		                <div class="input-group mb-3 border">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text" id="basic-addon5">
		                            <img src="{{ asset('mawaisnow/img/auth/password.png') }}" class="noselect" alt="">
		                        </span>
		                    </div>
		                    <input value="{{ old('password') }}" name="password" type="password" class="border-0 form-control shadow-none cstmFormControl" placeholder="Password" aria-label="Password" aria-describedby="basic-addon5" required>
		                </div>
			            <div class="col-10 offset-1 my-3">
			                <button type="submit" class="btn btn-primary btn-lg " name="button">Create account</button>
			            </div>
			        </div>
	            </div>
          </form>
        </div>
    </div>
    <script src="{{ asset( 'mawaisnow/able/assets/js/vendor-all.min.js' ) }}"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset( 'mawaisnow/able/assets/js/pcoded.min.js') }}"></script>
</body>
</html>
