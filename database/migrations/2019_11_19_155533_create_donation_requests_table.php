<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->smallInteger('age');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('bags_num');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->decimal('latitude', 10,8)->nullable();
			$table->decimal('longitude')->nuulable();
			$table->integer('city_id')->unsigned();
			$table->string('notes')->nullable();
			$table->integer('client_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}
