<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinsPoliciesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sins_policies', function (Blueprint $table) {
			$table->bigIncrements('policy_id');

			$table->string("policy_responsable");
			$table->integer("policy_company");
			$table->integer("policy_person");
			$table->text("policy_details");
			$table->integer("policy_secure_value");
			$table->integer("policy_deductible");
			$table->integer("policy_limits");

			$table->timestamp("policy_created")->nullable();
			$table->timestamp("policy_updated")->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sins_policies');
	}
}
