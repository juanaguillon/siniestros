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
			$table->integer("person_id");
			$table->string("person_email");
			$table->string("person_phone");
			$table->string("person_address");
			$table->string("person_city");
			$table->integer("person_created");
			$table->integer("person_updated");
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
