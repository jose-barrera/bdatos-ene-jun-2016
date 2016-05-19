<?php

namespace App\Models;

use Carbon\Carbon;
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
        'property_id', 'lessor_id', 'tenant_id', 'holder_id', 'expires'
    ];

	/**
	 * The attributes that should be mutated to dates.
	 * @var [type]
	 */
	protected $dates = ['created_at', 'updated_at', 'expires'];

	public function setExpiresAttribute($value)
	{
		$this->attributes['expires'] = Carbon::createFromFormat(
			'Y-m-d', $value);
	}

	public function getLessorAttribute()
	{
		return $this->property->lessor;
	}

	public function getLessorIdAttribute()
	{
		return $this->property->lessor->id;
	}

	public function property()
	{
		return $this->belongsTo('App\Models\Property', 'property_id');
	}

	public function holder()
	{
		return $this->belongsTo('App\Models\User', 'holder_id');
	}

	public function tenant()
	{
		return $this->belongsTo('App\Models\User', 'tenant_id');
	}
}
