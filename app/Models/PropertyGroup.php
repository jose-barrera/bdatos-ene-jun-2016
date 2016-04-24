<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyGroup extends Model
{
	protected $table = 'property_groups';

	public function properties()
	{
		return $this->hasMany('App\Models\Property', 'property_group_id');
	}
}
