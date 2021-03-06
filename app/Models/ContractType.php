<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
	protected $table = 'contract_types';

	public function properties()
	{
		return $this->hasMany('App\Models\Property', 'contract_id');
	}
}
