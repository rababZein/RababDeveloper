<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalinfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('professionalinfos', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('currentjob','100');
			$table->string('title','100');
            $table->dateTime('startwork_at')->nullable();
            $table->string('companywebsite','100')->nullable();
			$table->boolean('d_maker')->default(0)->nullable();
            $table->string('colleage','100')->nullable();
			$table->string('degree','30')->nullable();
			$table->dateTime('graduated_at')->nullable();
			$table->string('fax','30')->nullable();
			$table->string('facebook','100')->nullable();
			$table->string('twitter','100')->nullable();
			$table->string('linkedIn','100')->nullable();
			$table->string('ownwebsite','100')->nullable();
			$table->string('language','100')->nullable();
			$table->string('level','100')->nullable();

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			


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
		Schema::drop('professionalinfos');
	}

}
