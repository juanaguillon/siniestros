<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinsClientsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sins_clients', function (Blueprint $table) {
			$table->bigIncrements('client_id');

			$table->string("client_name")->nullable();
			$table->string("client_address");

			$table->string("client_nit");
			$table->string("client_email");
			$table->string("client_contact_person");
			$table->string("client_phone");

			$table->timestamp("client_created")->nullable();
			$table->timestamp("client_updated")->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sins_clients');
	}
}
