<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('property', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('description');
			$table->string('address');
			$table->integer('type_id');
			$table->integer('lessor_id');
			$table->integer('property_group_id');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('property');
	}

}
