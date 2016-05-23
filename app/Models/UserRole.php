<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserRole extends Model
{
	protected $table = 'user_roles';

	public function users()
	{
		return $this->belongsToMany('App\Models\User', 'rel_user_role',
			'role_id', 'user_id');
	}
	public function searchUsers($search)
	{
		return $this->users()->select('id',DB::raw('concat_ws(" ", first_name, first_last_name, email) as name_email'))->where(function ($query) use ($search){
            $query->orWhere('email', 'like', "%$search%")->orWhere('first_name', 'like', "%$search%")->orWhere('first_last_name', 'like', "%$search%");
        });
	}
}
