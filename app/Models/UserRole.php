<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
	protected $table = 'user_roles';

	public function users()
	{
		return $this->belongsToMany('App\Models\User', 'rel_user_role',
			'role_id', 'user_id');
	}
}
