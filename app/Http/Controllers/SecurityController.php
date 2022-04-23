<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class SecurityController extends Controller
{
	public function index($id) {
		$userSecurityData = User::where('id', $id)->first(['email', 'id']);
		return view('editSecurity', ['userSecurityData' => $userSecurityData]);
   }

	public function update(Request $request) {

		$user = User::find($request->id);
		
		if($user->email != $request->email){
			$this->validate($request, [
				'email' => 'required|string|email|max:255|unique:users'
			]);
		}
		
		$this->validate($request, [
         'password' => 'required|string|min:4|confirmed'
		]);
		
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
	
		$user->save();
		
		return redirect(route('profile', ['id' => $request->id]));
	}
}