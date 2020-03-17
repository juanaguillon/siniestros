<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinsPersonsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sins_persons', function (Blueprint $table) {
			$table->bigIncrements("person_id");
			$table->string("person_email");
			$table->string("person_phone");
			$table->string("person_address");
			$table->string("person_city");
			$table->timestamp("person_created")->nullable();
			$table->timestamp("person_updated")->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sins_persons');
	}
}
