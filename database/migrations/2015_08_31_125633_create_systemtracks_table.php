<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemtracksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('systemtracks', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('spot_id')->unsigned();
			$table->foreign('spot_id')->references('id')->on('spots')->onDelete('cascade');

			$table->integer('activity_id')->unsigned();
			$table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
			
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			
			$table->timestamp('comein_at');
			$table->dateTime('leave_at');
			
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
		Schema::drop('systemtracks');
	}

}
