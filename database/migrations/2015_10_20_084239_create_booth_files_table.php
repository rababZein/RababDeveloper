<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoothFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booth_files', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('booth_id')->unsigned();
			$table->foreign('booth_id')->references('id')->on('booths')->onDelete('cascade');
			
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
		Schema::drop('booth_files');
	}

}
