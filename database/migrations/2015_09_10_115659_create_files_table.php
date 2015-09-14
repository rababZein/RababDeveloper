<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name','50');
		    $table->longText('desc')->nullable();
		    $table->integer('numberofseen')->unsigned()->default('0');
			$table->integer('numberofdownload')->unsigned()->default('0');
			$table->string('link','200');
			$table->enum('type', ['img' ,'audio','video','pdf','pershore','adv']);
			$table->string('file','500');
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
		Schema::drop('files');
	}

}
