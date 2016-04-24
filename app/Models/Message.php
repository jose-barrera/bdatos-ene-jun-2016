<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $table = 'mesages';

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

	public function property()
	{
		return $this->belongsTo('App\Models\User', 'property_id');
	}

	public function category()
	{
		return $this->belongsTo('App\Models\User', 'category_id');
	}
}
