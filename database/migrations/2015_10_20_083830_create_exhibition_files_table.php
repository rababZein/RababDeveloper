<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExhibitionFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exhibition_files', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('exhibition_id')->unsigned();
			$table->foreign('exhibition_id')->references('id')->on('exhibitions')->onDelete('cascade');
			
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
		Schema::drop('exhibition_files');
	}

}
