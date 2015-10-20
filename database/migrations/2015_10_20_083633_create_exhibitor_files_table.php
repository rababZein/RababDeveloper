<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExhibitorFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exhibitor_files', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('exhibitor_id')->unsigned();
			$table->foreign('exhibitor_id')->references('id')->on('exhibitors')->onDelete('cascade');
			
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
		Schema::drop('exhibitor_files');
	}

}
