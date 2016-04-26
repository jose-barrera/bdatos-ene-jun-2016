<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'email' => 'user@example.com',
        	'password' => bcrypt('password'),
        	'first_name' => 'First',
        	'last_name' => 'Last',
        	'gender' => true,
        	'mobile_phone' => 'phone'
        ]);
    }
}
