<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('phone');
			$table->string('password');
			$table->string('name');
			$table->string('email');
			$table->date('date_of_birth');
			$table->integer('blood_type_id')->unsigned();
			$table->date('last_donation_date');
			$table->integer('city_id')->unsigned();
			$table->string('pin_code')->nullable();
			$table->string('api_token', 60)->unique()->nullable();
            $table->tinyInteger('active')->default('0');

        });
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
