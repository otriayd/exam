<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		  $users = DB::table('users')
		  	->leftJoin('userdatas', 'users.id', '=', 'userdatas.user_id')
			->select('user_id', 'email', 'address', 'status', 'name', 'avatar', 'position', 'phone', 'address', 'vk', 'telegram', 'instagram')
			->paginate(9);
        return view('home', ['users' => $users]);
    }
}