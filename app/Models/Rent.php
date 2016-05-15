<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
	protected $table = 'rents';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id', 'lessor_id', 'tenant_id', 'holder_id', 'active'
    ];

	public function property()
	{
		return $this->belongsTo('App\Models\Property', 'property_id');
	}

	public function tenant()
	{
		return $this->belongsTo('App\Models\User', 'tenant_id');
	}

	public function holder()
	{
		return $this->belongsTo('App\Models\User', 'holder_id');
	}

	public function lessor()
	{
		return $this->belongsTo('App\Models\User', 'lessor_id');
	}
}
