<?php

use Illuminate\Database\Seeder;

use App\Role;

use App\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'Project Administrator'; // optional
		$admin->description  = 'User is allowed to manage and edit and create other users'; // optional
		$admin->save();
		
		$user = new Role();
		$user->name         = 'user';
		$user->display_name = 'Project User'; // optional
		$user->description  = 'User is allowed to manage and edit own account'; // optional
		$user->save();

		$createUser = new Permission();
      $createUser->name         = 'create-user';
      $createUser->display_name = 'Create User'; // optional
      // Allow a user to...
      $createUser->description  = 'create new project user'; // optional
      $createUser->save();

      $editUser = new Permission();
      $editUser->name         = 'edit-user';
      $editUser->display_name = 'Edit User'; // optional
      // Allow a user to...
      $editUser->description  = 'edit existing users'; // optional
      $editUser->save();

		$editOwnAccount = new Permission();
      $editOwnAccount->name         = 'edit-own-account';
      $editOwnAccount->display_name = 'Edit Own Account'; // optional
      // Allow a user to...
      $editOwnAccount->description  = 'edit own account'; // optional
      $editOwnAccount->save();

      $admin->attachPermissions([$createUser, $editUser, $editOwnAccount]);
		$user->attachPermission($editOwnAccount);
    }
}