<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
	protected $table = 'properties';

	protected $fillable = [
		'alias', 'description', 'address', 'postal_code', 'price', 'maintenance_cost', 'capacity', 'contract_id', 'type_id', 'lessor_id'
	];

	public function type()
	{
		return $this->belongsTo('App\Models\PropertyType', 'type_id');
	}

	public function contract()
	{
		return $this->belongsTo('App\Models\ContractType', 'contract_id');
	}

	public function lessor()
	{
		return $this->belongsTo('App\Models\User', 'lessor_id');
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
