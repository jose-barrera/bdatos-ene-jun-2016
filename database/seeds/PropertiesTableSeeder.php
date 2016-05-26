<?php

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertiesTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		Property::create([
			'alias' => 'Altabrisa',
            'description' => 'Departamento de Lujo',
            'address' => 'Av. Centro',
            'postal_code' => '24640',
            'price' => '6000',
            'maintenance_cost' => '2000',
            'capacity' => '4',
            'contract_id' => 1,
            'type_id' => 1,
            'lessor_id' => 1]);
	}
}
