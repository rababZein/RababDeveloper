<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoothsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booths', function(Blueprint $table)
		{
			$table->increments('id');

		    $table->string('name','50');
		    $table->longText('desc')->nullable();

			$table->integer('modeldesign_id')->unsigned();
			$table->foreign('modeldesign_id')->references('id')->on('modeldesigns')->onDelete('cascade');
			
			$table->integer('type_id')->unsigned();
			$table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
			
			$table->integer('exhibitor_id')->unsigned();
			$table->foreign('exhibitor_id')->references('id')->on('exhibitors')->onDelete('cascade');
			
			$table->integer('exhibition_event_id')->unsigned();
			$table->foreign('exhibition_event_id')->references('id')->on('exhibition_events')->onDelete('cascade');
			
			$table->integer('spot_id')->unsigned();
			$table->foreign('spot_id')->references('id')->on('spots')->onDelete('cascade');
			
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
		Schema::drop('booths');
	}

}
