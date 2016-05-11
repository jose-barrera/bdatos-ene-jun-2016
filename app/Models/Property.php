<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
	protected $table = 'properties';

	protected $fillable = [
		'title', 'description', 'address', 'postal_code',
		'type_id', 'lessor_id', 'property_group_id'
	];

	public function type()
	{
		return $this->belongsTo('App\Models\PropertyType', 'type_id');
	}

	public function lessor()
	{
		return $this->belongsTo('App\Models\User', 'lessor_id');
	}

	public function propertyGroup()
	{
		return $this->belongsTo('App\Models\PropertyGroup', 'property_group_id');
	}

	public function currentRent()
	{
		return $this->hasOne('App\Models\Rent', 'property_id');
	}

	public function messages()
	{
		return $this->hasMany('App\Models\Message', 'property_id');
	}
}
