<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExhibitorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exhibitors', function(Blueprint $table)
		{
			$table->increments('id');


			$table->string('name','50');
			$table->longtext('desc')->nullable();
			$table->longText('address')->nullable();
            $table->string('phone','20')->nullable();
			$table->string('anotherphone','20')->nullable();
     			
			$table->string('fax','30')->nullable();
			
			
			$table->integer('country_id')->unsigned()->nullable();
			$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

		    $table->string('city','30')->nullable();

			$table->integer('company_id')->unsigned();
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
			


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
		Schema::drop('exhibitors');
	}

}
