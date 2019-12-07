<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('play_store_url')->nullable();
			$table->string('app_store_url')->nullable();
			$table->longText('notification_settings_text')->nullable();
			$table->string('about_app')->nullable();
			$table->string('phone');
			$table->string('phone_email');
			$table->string('fb_link')->nullable();
			$table->string('tw_link')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
