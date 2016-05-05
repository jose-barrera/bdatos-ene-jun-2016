<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('first_name');
			$table->string('last_name');
			$table->boolean('gender'); // Male = true, Female = false
			$table->string('mobile_phone')->nullable();
			$table->string('home_phone')->nullable();
			$table->string('office_phone')->nullable();
			$table->rememberToken();
			$table->timestamps();

			// $table->primary('id');
		});

		Schema::create('user_roles', function (Blueprint $table) {
			$table->increments('id');
			$table->string('key')->unique();
			$table->string('description');
			$table->timestamps();

			// $table->primary('id');
		});

		Schema::create('property_groups', function (Blueprint $table) {
			$table->increments('id');
			$table->string('description');
			$table->string('address');
			$table->timestamps();

			// $table->primary('id');
		});

		Schema::create('property_types', function (Blueprint $table) {
			$table->increments('id');
			$table->string('key')->unique();
			$table->string('description');
			$table->timestamps();

			// $table->primary('id');
		});

		Schema::create('properties', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('description');
			$table->string('address');
			$table->integer('postal_code');
			$table->integer('type_id')->unsigned()->comment('Tipo de propiedad');
			$table->integer('lessor_id')->unsigned()->comment('Arrendador');
			$table->integer('property_group_id')->unsigned()->nullable()
				->comment('Opcional: Pertenece a un grupo de propiedad (propiedad multiple)');
			$table->timestamps();

			// $table->primary('id');
			$table->foreign('type_id')->references('id')->on('property_types');
			$table->foreign('lessor_id')->references('id')->on('users');
			$table->foreign('property_group_id')->references('id')
				->on('property_groups');
		});

		Schema::create('message_categories', function (Blueprint $table) {
			$table->increments('id');
			$table->string('subject');
			$table->string('description');
			$table->timestamps();

			// $table->primary('id');
		});

		Schema::create('messages', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('tenant_id')->unsigned()->comment('Inquilino');
			$table->integer('holder_id')->unsigned()->comment('Arrendatario');
			$table->integer('lessor_id')->unsigned()->comment('Arrendador');
			$table->integer('property_id')->unsigned()->comment('Propiedad');
			$table->integer('category_id')->unsigned()->comment('Catgoria de mensaje');
			$table->boolean('solved')->default(false);
			$table->string('subject');
			$table->string('text');
			$table->dateTime('sent_on');
			$table->timestamps();

			// $table->primary('id');
			$table->foreign('tenant_id')->references('id')->on('users');
			$table->foreign('holder_id')->references('id')->on('users');
			$table->foreign('lessor_id')->references('id')->on('users');
			$table->foreign('property_id')->references('id')->on('properties');
			$table->foreign('category_id')->references('id')->on('message_categories');
		});

		Schema::create('notifications', function (Blueprint $table) {
			$table->increments('id');
			$table->string('subject');
			$table->integer('lessor_id')->unsigned();
			$table->timestamps();

			// $table->primary('id');
			$table->foreign('lessor_id')->references('id')->on('users');
		});

		Schema::create('rel_user_role', function (Blueprint $table) {
			$table->integer('user_id')->unsigned();
			$table->integer('role_id')->unsigned();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('role_id')->references('id')->on('user_roles');
		});

		Schema::create('rents', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('property_id')->unsigned()->comment('Propiedad');
			$table->integer('tenant_id')->unsigned()->comment('Inquilino');
			$table->integer('holder_id')->unsigned()->comment('Arrendatario');
			$table->integer('lessor_id')->unsigned()->comment('Arrendador');
			$table->boolean('active');
			$table->timestamps();

			// $table->primary('id');
			$table->foreign('property_id')->references('id')->on('properties');
			$table->foreign('tenant_id')->references('id')->on('users');
			$table->foreign('holder_id')->references('id')->on('users');
			$table->foreign('lessor_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rents');
		Schema::drop('rel_user_role');
		Schema::drop('notifications');
		Schema::drop('messages');
		Schema::drop('message_categories');
		Schema::drop('properties');
		Schema::drop('property_types');
		Schema::drop('property_groups');
		Schema::drop('user_roles');
		Schema::drop('users');
	}
}
