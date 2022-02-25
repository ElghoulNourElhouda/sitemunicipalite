<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['as'] == "agent") {
            return Validator::make($data, [
                'entreprise' => 'required|max:255',
                'location' => 'required|max:350',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'phone' => 'required|min:8',
            ]);
        }else if ($data['as'] == "condidat") {
            return Validator::make($data, [
                'username' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'phone' => 'required|min:8',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if ($data['as'] == "agent") {

            return User::create([
                'username' => $data['entreprise'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => bcrypt($data['password']),
                'email_token' => str_random(10),
                'agent' => '1',
                'location' => $data['location'],
            ]);

        }else if ($data['as'] == "condidat") {
            if (empty($data['lastname'])) {
            # code...
                return User::create([
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => bcrypt($data['password']),
                    'email_token' => str_random(10),
                ]);
            }elseif ($data['lastname']) {
            # code...
                return User::create([
                    'username' => $data['username'],
                    'lastname'=> $data['lastname'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => bcrypt($data['password']),
                    'email_token' => str_random(10),
                ]);
            }
        }
        
        
    }
}
