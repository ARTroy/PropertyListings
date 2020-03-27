<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo = '/profile';


    public function create(Request $request, User $user)
    {
        $data = $request->all();
        $validator = Validator::make( $data, [
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
        $user->admin = $data['admin'];
        if(isset($data['admin'])){
            $user->api_token = str_random(60);
        } else {
             $user->api_token = null;
        }

        return back();
    }

    public function login(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {

            return back()
                ->withInput($request->all())
                ->withErrors($validator);
        } else {
            if (Auth::attempt([
                    'email' => $request->input('email'), 
                    'password' => $request->input('password')
                ],true)) 
            {
                // Authentication passed...
                if(Auth::user()->admin){
                    return redirect(action('UserController@profile'));
                } else {
                    return redirect(action('UserController@profile'));
                }
                
            } else {
                return back()->withErrors('Provided credentials are invalid');
            }
        }
    }
}
