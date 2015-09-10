<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExhibitionEventHallsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exhibition_event_halls', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('hall_id')->unsigned();
			$table->foreign('hall_id')->references('id')->on('halls')->onDelete('cascade');
			
			$table->integer('exhibition_event_id')->unsigned();
			$table->foreign('exhibition_event_id')->references('id')->on('exhibition_events')->onDelete('cascade');
			
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
		Schema::drop('exhibition_event_halls');
	}

}
