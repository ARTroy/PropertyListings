<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserInvite;

class HomeController extends Controller
{
	public function index(){
		return view('public.home');
	}
}
