<?php

use Illuminate\Database\Seeder;
use App\Models\ContractType;

class ContractTypesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		ContractType::create([
			'key' => 'monthly',
			'description' => 'Mensual']);

		ContractType::create([
			'key' => 'biannual',
			'description' => 'Semestral']);
		
		ContractType::create([
			'key' => 'annual',
			'description' => 'Anual']);
	}
}
