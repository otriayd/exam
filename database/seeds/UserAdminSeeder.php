<?php

use Illuminate\Database\Seeder;

use App\User;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		  $user = User::create(['email' => 'admin@admin.com', 'password' => Hash::make('admin'), 'remember_token' => str_random(60)]);
		  $user->userdata()->create();
		  $user->roles()->attach(1);
    }
}