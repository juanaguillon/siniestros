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
			$table->string("sinister_place")->nullable();
			$table->dateTime("sinister_noticed");
			$table->dateTime("sinister_presented");
			$table->date("sinister_datepact");
			$table->integer("sinister_pretention");
			$table->integer("sinister_reservation");
			$table->enum("sinister_status", range(0, 5))->comment("0-Validando, 1-Acpetado, 2-En proceso, 3-Finalizado, 4-Rechazado, 5-Reabierto");

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
