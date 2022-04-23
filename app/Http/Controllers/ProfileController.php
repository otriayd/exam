<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
	public function index($id) {
		$user = User::find($id, ['id']);
		$userdata = $user->userdata()->first();
		
		return view('profile', ['userdata' => $userdata]);
	}
}