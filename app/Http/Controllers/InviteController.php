<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserInvite;

class InviteController extends Controller
{
	public function create(){
		return view('public.claim');
	}

	public function store(){

	}
}
