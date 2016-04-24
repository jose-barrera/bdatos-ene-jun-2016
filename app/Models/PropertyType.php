<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
	protected $table = 'property_types';

	public function properties()
	{
		return $this->hasMany('App\Models\Property', 'type_id');
	}
}
