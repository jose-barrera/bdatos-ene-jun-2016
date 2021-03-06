<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'showRegistrationForm', 'register']]);
        $this->middleware('auth.lessor', ['only' => ['showRegistrationForm', 'register']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'first_last_name' => 'required|max:255',
            'second_last_name' => 'max:255',
            'gender' => 'required|boolean',
            'mobile_phone' => 'numeric',
            'home_phone' => 'numeric',
            'office_phone' => 'numeric',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'first_last_name' => $data['first_last_name'],
            'second_last_name' => $data['second_last_name'],
            'gender' => $data['gender'],
            'mobile_phone' => $data['mobile_phone'],
            'home_phone' => $data['home_phone'],
            'office_phone' => $data['office_phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user->roles()->sync(explode(',', $data['roles']));
        $user->save();
        return $user;
    }
}
