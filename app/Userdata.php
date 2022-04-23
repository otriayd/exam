<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
	
	protected $fillable = [
		'user_id', 'status', 'name', 'avatar', 'position', 'phone', 'address', 'vk', 'telegram', 'instagram',
  ];
  
   public function userdata() {

		return $this->belongsTo('App\User', 'user_id');
		
	}
}