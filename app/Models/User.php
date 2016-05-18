<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as BaseUser;

class User extends BaseUser
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'first_last_name',
		'second_last_name', 'gender', 'mobile_phone',
		'home_phone', 'office_phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	protected $table = 'users';

	/**
	 * Dynamic full_name field.
	 * @return string
	 */
	public function getFullNameAttribute()
	{
		if (isset($this->second_last_name))
			return "$this->first_name $this->first_last_name" .
				" $this->second_last_name";
		return "$this->first_name $this->first_last_name";
	}

	public function roles()
	{
		return $this->belongsToMany('App\Models\UserRole', 'rel_user_role',
			'user_id', 'role_id');
	}

	public function messagesAsTenant()
	{
		return $this->hasMany('App\Models\Message', 'tenant_id');
	}

	public function messagesAsHolder()
	{
		return $this->hasMany('App\Models\Message', 'holder_id');
	}

	public function messagesAsLessor()
	{
		return $this->hasMany('App\Models\Message', 'lessor_id');
	}

	public function propertiesAsLessor()
	{
		return $this->hasMany('App\Models\Property', 'lessor_id');
	}

	public function rentsAsTenant()
	{
		return $this->hasMany('App\Models\Rent', 'tenant_id');
	}

	public function rentsAsHolder()
	{
		return $this->hasMany('App\Models\Rent', 'holder_id');
	}

	public function rentsAsLessor()
	{
		return $this->hasMany('App\Models\Rent', 'lessor_id');
	}

	public function notifications()
	{
		return $this->hasMany('App\Models\Notification', 'lessor_id');
	}

	public function hasRole($role_key)
	{
		foreach($this->roles()->get() as $role) {
			if ($role->key === $role_key)
				return true;
		}
		return false;
	}
}
