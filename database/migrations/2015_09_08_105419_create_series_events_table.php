<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('series_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name','50');
		    $table->longText('desc')->nullable();

		    $table->integer('exhibition_id')->unsigned();
			$table->foreign('exhibition_id')->references('id')->on('exhibitions')->onDelete('cascade');
			
			$table->integer('exhibitor_id')->unsigned();
			$table->foreign('exhibitor_id')->references('id')->on('exhibitors')->onDelete('cascade');
			
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
		Schema::drop('series_events');
	}

}
