<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\UserInvite;

class UserController extends Controller
{
	protected $user;

	public function __construct(array $attributes = array()) {
		$this->user = Auth::user();
	}

    public function profile(){
		$properties = $this->user->properties;
		$invites = $this->user->userInvites;
		return view('user.profile', [
			'user'=>$this->user, 
			'properties'=>$properties,
			'invites'=>$invites
		]);
	}

	public function profileAdmin(){
		$properties = Property::all();
		$invites = UserInvite::all();
		return view('user.profile', [
			'user'=>$this->user, 
			'properties'=>$properties,
			'invites'=>$invites
		]);
	}
	
}