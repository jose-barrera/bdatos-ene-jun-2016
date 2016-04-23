<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('tenant_id');
			$table->integer('holder_id');
			$table->integer('lessor_id');
			$table->integer('property_id');
			$table->integer('category_id');
			$table->boolean('solved');
			$table->string('subject');
			$table->text('text', 65535);
			$table->dateTime('sent_on');
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
		Schema::drop('message');
	}

}
