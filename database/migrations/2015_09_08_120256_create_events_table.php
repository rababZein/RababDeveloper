<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name','50');
		    $table->longText('desc')->nullable();
		    $table->string('type','50');
		    $table->enum('privacy', ['public', 'private'])->default('public');

		    $table->integer('series_event_id')->unsigned();
			$table->foreign('series_event_id')->references('id')->on('series_events')->onDelete('cascade');
			
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
		Schema::drop('events');
	}

}
