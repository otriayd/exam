<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StatusController extends Controller
{
	public function index($id) {
		$userdata = User::find($id)->userdata()->first(['status', 'user_id']);
		$arrayStatus = [0 => 'не беспокоить', 1 => 'отошёл', 2 => 'онлайн'];
		return view('status', ['userdata'=> $userdata, 'arrayStatus' => $arrayStatus]);
	}

	public function set(Request $request) {
	
		$userdata = User::find($request->id)->userdata()->first(['id','status']);
		$userdata->status = $request->status;
		$userdata->save();
	
		return redirect(route('profile', ['id' => $userdata->id]));
		
	}
}