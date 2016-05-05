<?php

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRolesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		UserRole::create([
			'key' => 'lessor',
			'description' => 'Arrendador'
		]);

		UserRole::create([
			'key' => 'holder',
			'description' => 'Arrendatario',
		]);

		UserRole::create([
			'key' => 'tenant',
			'description' => 'Inquilino'
		]);
	}
}
