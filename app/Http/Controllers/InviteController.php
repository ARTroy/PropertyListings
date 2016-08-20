<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserInvite;
use App\Models\User;
use DateTime;

class InviteController extends Controller
{
	/*public function __construct(User $user){
        $this->user = $user;
    }*/


	public function index_create(){
		return view('admin.invite.index_create', [
			'invites' => UserInvite::all(),
		]);
	}

	public function claim_store(Request $request){
		if( $request->has('email') && $request->has('invite_code') ){
			$invite = UserInvite::where('code', '=', trim($request->input('invite_code')))
			->where('invite_email', '=', trim($request->input('email')))
			->whereNull('claimed_at')
			->whereNull('user_id')
			->first();

			if($invite){
				$invite->claimed_at = new \DateTime();
				$user = User::where('email','=',$invite->invite_email)->first();
				if($user){
					$invite->user_id = $user->id;
				} else {
					$user = new User();
					$user->password = bcrypt($invite->invite_code);
					$user->email = $invite->invite_email;
					$user->save();

					$invite->user_id = $user->id;					
				}
				$invite->save();

				//change to user profile when finished
				return back()->with('info', 'You have claimed the invitation code');
			} else {
				return back()->withErrors('You need to input the code sent to you via email.');
			}
		} else {
			return back()->withErrors('You need to input the code sent to you via email.');
		}
	}

	public function store(Request $request){
    	$userInvite = new UserInvite();

        if($request->has('invite_email') && 
        	(
        		strlen(trim($request->input('invite_email'))) > 0 &&
        		filter_var($request->input('invite_email'), FILTER_VALIDATE_EMAIL)
        	)
        ){
        	$user = User::where('email', '=', trim($request->input('invite_email')))->first();
	        if($user){
	        	
	        	$userInvite->invite_email = $request->input('invite_email');
	        	$userInvite->user_id = $user->id;
	        	$userInvite->code = str_random(8);
	        	$userInvite->claimed_at = new DateTime();
	        	$userInvite->save();
	        } else {
	        	$userInvite->code = str_random(8);
	        	$userInvite->invite_email = $request->input('invite_email');
	        	$userInvite->user_id = null;
	        	$userInvite->save();
	        }
	        return back()->with('message', 'saved');
        }
         return back()->withErrors('invite_email required');
	}
}
