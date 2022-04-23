<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\Userdata;
use App\Role;
use Illuminate\Http\Request;


Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {

	Route::get('/addUser', ['middleware' => ['permission:create-user'], 'uses' => 'UserController@show_add'])->name('addUser');
	
	Route::post('/createUser', ['middleware' => ['permission:create-user'], 'uses' => 'UserController@create'])->name('createUser');

	Route::get('factory', function () {
		factory(App\Userdata::class, 10)->create();
		return redirect(route('home'));
	});
   
});

Route::middleware(['auth'])->group(function () {

	Route::get('/', 'HomeController@index')->name('home');

});

Route::middleware(['permissionedit'])->group(function () {

	Route::get('/editUser/{id}', 'UserController@show_edit')->name('editUser');

	Route::post('/updateUser', 'UserController@update')->name('updateUser');

   Route::get('/editSecurity/{id}', 'SecurityController@index')->name('editSecurity');

   Route::post('/updateSecurity', 'SecurityController@update')->name('updateSecurity');

   Route::get('/deleteUser/{id}', 'UserController@delete')->name('deleteUser');

   Route::get('/addAvatar/{id}', 'AvatarController@index')->name('addAvatar');

   Route::post('/updateAvatar', 'AvatarController@update')->name('updateAvatar');

   Route::get('/status/{id}', 'StatusController@index')->name('status');

   Route::post('/setStatus', 'StatusController@set')->name('setStatus');

   Route::get('/profile/{id}', 'ProfileController@index')->name('profile');
	
});