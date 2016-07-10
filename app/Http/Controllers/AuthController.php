<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

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
    use ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(Request $request, User $user)
    {
        $validator = Validator::make( $request->all(), [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->admin = 1;
        $user->api_token = str_random(60);

        return back();
    }

    public function login(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        //dd($validator);
        if ($validator->fails()) {
            //dd($validator);
            return back()
                ->withInput($request->all())
                ->withErrors($validator);
        } else {
            if (Auth::attempt([
                    'email' => $request->input('email'), 
                    'password' => $request->input('password')
                ])) 
            {
                // Authentication passed...
                return redirect()->intended('dashboard');
            } else {
                return back()->withErrors(['Provided credentials are invalid']);
            }
        }
    }
}
