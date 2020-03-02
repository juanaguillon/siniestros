<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinsUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sins_users', function (Blueprint $table) {
			$table->bigIncrements('user_id');

			$table->string("user_name");
			$table->enum("user_rol", array("admin", "editor", "analyst"));

			$table->string("user_email")->nullable();
			$table->string("user_password")->nullable();

			$table->timestamp("user_created")->nullable();
			$table->timestamp("user_updated")->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sins_users');
	}
}
