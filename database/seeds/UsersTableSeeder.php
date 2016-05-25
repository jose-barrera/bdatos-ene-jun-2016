<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * UserRolesTableSeeder must be run before this seeder.
     *
     * @return void
     */
    public function run()
    {
        $tenant = UserRole::where('key', 'tenant')->first();
        $lessor = UserRole::where('key', 'lessor')->first();

        $user = User::create([
        	'email' => 'user@example.com',
        	'password' => bcrypt('password'),
        	'first_name' => 'User',
        	'first_last_name' => 'First',
            'second_last_name' => 'Second',
        	'gender' => true,
        	'mobile_phone' => '9999999'
        ])->roles()->saveMany([$tenant, $lessor]);
    }
}
