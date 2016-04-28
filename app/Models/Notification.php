<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $table = 'notifications';

	public function lessor()
	{
		return $this->belongsTo('App\Models\User', 'lessor_id');
	}
}
