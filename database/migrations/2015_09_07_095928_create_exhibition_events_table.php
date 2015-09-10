<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExhibitionEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exhibition_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name','50');
		    $table->longText('desc')->nullable();
			$table->dateTime('start_time')->nullable();
			$table->dateTime('end_time')->nullable();
	        $table->enum('privacy', ['public', 'private'])->default('public');

	      
			$table->integer('exhibition_id')->unsigned();
			$table->foreign('exhibition_id')->references('id')->on('exhibitions')->onDelete('cascade');
			


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
		Schema::drop('exhibition_events');
	}

}
