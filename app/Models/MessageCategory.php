<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageCategory extends Model
{
	protected $table = 'message_categories';

	protected $fillable = ['subject', 'description'];

	public function messages()
	{
		return $this->hasMany('App\Models\Message', 'category_id');
	}
}
