<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $table = 'mesages';

	/**
	 * Returns a bool expressing whether the message has been read.
	 * @return bool
	 */
	public function getReadAttribute()
	{
		return isset($this->attributes['read_on']);
	}

	public function sender()
	{
		return $this->belongsTo('App\Models\User', 'sender_id');
	}

	public function receiver()
	{
		return $this->belongsTo('App\Models\User', 'receiver');
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
