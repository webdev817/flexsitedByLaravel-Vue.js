@extends('layouts.auth')
@section('body')
<div class="container p-0 shadow-sm">

    <div class="row m-0">
        <div class="col-12 hero prelative p-0">
        
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
        <div class="row bg-white  mb-5 mx-0">
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
                        By creating this account, you agree to the <a type="button" data-toggle="modal" data-target="#termsModal" href="">Terms and Conditions</a> and
                        <a type="button" data-toggle="modal" data-target="#policyModal" href="">Privacy Policy.</a>

                    </label>
                </div>
            </div>
            <div class="col-10 offset-1">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if(old('agree') == 1) checked
                    @endif value="1" class="custom-control-input" name="termsandConditions" id="notifications" required>
                    <label class="custom-control-label" for="notifications">
                    Opt in to receive project notifications texts </label>
                </div>
            </div>

            <div class="col-10 offset-1 my-3">
                <button type = "submit" class="btn btn-block btn-cstm rounded-0 btn-lg shadow-none" data-toggle="modal" data-target="#notification">Create account</button>
            </div>

        </div>
        
    </form>
  </div>

 
    @include('termsAndPolicy.modal')

</div> 

<div class="modal fade" id="popup-btn">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header text-center p-5" style= "background-color:black;">
            <img src = "{{ asset('mawaisnow/logo/FLEXSITED-2.jpg') }}" class="w-100">
            </div>
            
            <!-- Modal body -->
            <div class="modal-body pt-5 pl-md-5 pr-md-5 pb-3">
                <div class="ml-5 pl-md-4">
                <h5><strong>Here's the next steps:</strong></h5>
                <p>1) Sign Up</p>
                <p>2) Complete on-boarding(10min)</p>
                <p>3) We'll confirm your details & get started!</p>
                </div>
            
            </div>
            
            <!-- Modal footer -->
            <div class="text-center mt-3 mb-4" >
            <button type="button" class="btn pt-2 pb-2 pl-4 pr-4" data-dismiss="modal" style="background-color:#5AC9C6; color:white!important;">Great!</button>
            </div>
            
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript">
   $( document ).ready(function() {
        $('#popup-btn').modal();
    });
               
</script>
@endsection
 
