<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\User;

class UserController extends Controller
{
	public function show_add() {
		return view('addUser');
	}

	public function show_edit($id) {
		$userdata = User::find($id)->userdata()->first();
		return view('editUser', ['userdata' => $userdata]);
   }

	public function create(Request $request) {

		$this->validate($request, [
			'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:4',
			'avatar' => 'nullable|image',
		]);

		$newUser = User::create([
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'remember_token' => str_random(60),
		]);
	
		$newUser->userdata()->create($request->only([
			'name', 'position', 'phone', 'address', 'status', 'vk', 'telegram', 'instagram',
		]));
	
		
		if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
			$avatarPath = $request->avatar->store('uploads/avatars');
			$newUser->userdata()->update([
				'avatar' => $avatarPath,
			]);
		}

		return redirect(route('home'));
   }


	public function update(Request $request) {

		$this->validate($request, [
			
		]);
	
		$newDataUser = User::find($request->id)->userdata()->first();
		
		$newDataUser->name = $request->name;
		$newDataUser->position =  $request->position;
		$newDataUser->phone =  $request->phone;
		$newDataUser->address =  $request->address;
		$newDataUser->save();
		
		return redirect(route('profile', ['id' => $request->id]));
   }


	public function delete($id) {
		$userdata = User::find($id)->userdata()->first();
		if(!empty($userdata->avatar) && $userdata->avatar != '/img/demo/avatars/avatar-m.png'){
			Storage::delete($userdata->avatar);
		}
		$user = User::destroy($id);
		return redirect(route('home'));
	}
}