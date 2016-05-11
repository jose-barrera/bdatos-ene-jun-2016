<?php

use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		PropertyType::create([
			'key' => 'appartment',
			'description' => 'Departamento']);

		PropertyType::create([
			'key' => 'house',
			'description' => 'Casa']);
		
		PropertyType::create([
			'key' => 'office',
			'description' => 'Oficina']);
	}
}