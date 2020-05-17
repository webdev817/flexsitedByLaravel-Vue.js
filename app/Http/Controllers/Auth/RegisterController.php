<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    // Email is associated with a closed account
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register()
    {
        $request = request();
        $user = User::where('email',$request->email)->where('status',2)->first();
        if ($user != null) {
          return back()->withErrors([
            'Email is associated with a closed account'
          ]);
        }
        $this->validator($request->all())->validate();


        event(new Registered($user = $this->create($request->all())));

        newNoti(1, "new user registered","new user " . $user->name . " has registered",
        route('clientOnBoarding',$user->id), 0);

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'businessName' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create(
            [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'businessName' => $data['businessName'],
            'password' => Hash::make($data['password']),
            ]
        );

        $user->rawPassword = $data['password'];

        $data = [
          'email' => $user->email,
          'user' => $user,
        ];

        sendSignUpEmail($data);



        return $user;
    }
}
