<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinsInsuresTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sins_insures', function (Blueprint $table) {
			$table->bigIncrements('insure_id');
			$table->string("insure_name");
			$table->string("insure_nit");
			$table->string("insure_social");
			$table->timestamp("insure_created");
			$table->timestamp("insure_updated");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sins_insures');
	}
}
