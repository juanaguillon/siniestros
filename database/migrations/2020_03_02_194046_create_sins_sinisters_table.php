<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinsSinistersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sins_sinisters', function (Blueprint $table) {
			$table->bigIncrements("sinister_id");
			
			$table->integer("sinister_policy");
			$table->integer("sinister_person");
			$table->string("sinister_place");
			$table->dateTime("sinister_noticed");
			$table->dateTime("sinister_presented");
			$table->integer("sinister_left_days");
			$table->integer("sinister_pretention");
			$table->integer("sinister_reservation");
			$table->integer("sinister_status");
			
			$table->timestamp("sinister_created")->nullable();
			$table->timestamp("sinister_updated")->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sins_sinisters');
	}
}
