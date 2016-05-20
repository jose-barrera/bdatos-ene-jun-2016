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
			$table->string('first_last_name');
			$table->string('second_last_name')->nullable();
			$table->boolean('gender'); // Male = true, Female = false
			$table->string('mobile_phone')->nullable();
			$table->string('home_phone')->nullable();
			$table->string('office_phone')->nullable();
			$table->rememberToken();
			$table->timestamps();

		});

		Schema::create('user_roles', function (Blueprint $table) {
			$table->increments('id');
			$table->string('key')->unique();
			$table->string('description');
			$table->timestamps();

		});

		Schema::create('property_types', function (Blueprint $table) {
			$table->increments('id');
			$table->string('key')->unique();
			$table->string('description');
			$table->timestamps();

		});

		Schema::create('properties', function (Blueprint $table) {
			$table->increments('id');
			$table->string('alias');
			$table->string('description');
			$table->string('address');
			$table->integer('postal_code');
			$table->integer('type_id')->unsigned()->comment('Tipo de propiedad');
			$table->integer('lessor_id')->unsigned()->comment('Arrendador');
			$table->timestamps();

			$table->foreign('type_id')->references('id')->on('property_types');
			$table->foreign('lessor_id')->references('id')->on('users');
		});

		Schema::create('message_categories', function (Blueprint $table) {
			$table->increments('id');
			$table->string('key')->unique();
			$table->string('description');
			$table->timestamps();

		});

		Schema::create('messages', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('sender_id')->unsigned()
				->comment('Remitente');
			$table->integer('receiver_id')->unsigned()
				->comment('Receptor');
			$table->integer('property_id')->unsigned()->nullable()
				->comment('Propiedad relacionada');
			$table->integer('category_id')->unsigned()
				->comment('Categoria de mensaje');
			$table->string('subject')->comment('Asunto del mensaje');
			$table->string('content')->comment('Cuerpo del mensaje');
			$table->dateTime('read_on')->nullable()
				->comment('Fecha en que fue leido el mensaje. Dejar como ' .
					'null para mensajes no leidos.');
			$table->timestamps();

			$table->foreign('sender_id')->references('id')->on('users');
			$table->foreign('receiver_id')->references('id')->on('users');
			$table->foreign('property_id')->references('id')->on('properties');
			$table->foreign('category_id')->references('id')
				->on('message_categories');
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
			$table->date('expires')->nullable()
				->comment('Dejar nulo para rentas de duracion indefinida.');
			$table->timestamps();

			$table->foreign('property_id')->references('id')->on('properties');
			$table->foreign('tenant_id')->references('id')->on('users');
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
		Schema::drop('messages');
		Schema::drop('message_categories');
		Schema::drop('properties');
		Schema::drop('property_types');
		Schema::drop('user_roles');
		Schema::drop('users');
	}
}
