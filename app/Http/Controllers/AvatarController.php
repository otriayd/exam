<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

class AvatarController extends Controller
{
	public function index($id) {
		$userdata = User::find($id)->userdata()->first(['id','avatar']);
		return view('addAvatar', ['userdata' => $userdata]);
	}

	public function update(Request $request) {
	
		$userdata = User::find($request->id)->userdata()->first(['id', 'avatar']);
		
		if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
	
			if(!empty($userdata->avatar)){
				Storage::delete($userdata->avatar);
			}
			$avatarPath = $request->avatar->store('uploads/avatars');
			$userdata->avatar = $avatarPath;
			$userdata->save();
		}
		return redirect(route('profile', ['id' => $request->id]));
		
	}
}