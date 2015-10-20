<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExhibitionEventFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exhibition_event_files', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('exhibition_event_id')->unsigned();
			$table->foreign('exhibition_event_id')->references('id')->on('exhibition_events')->onDelete('cascade');
			
			$table->integer('file_id')->unsigned();
			$table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
			
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
		Schema::drop('exhibition_event_files');
	}

}
