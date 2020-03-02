<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinsClibussTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sins_clibuss', function (Blueprint $table) {
            $table->bigIncrements('clibuss_id');
            $table->integer("clibuss_client");
            $table->integer("clibuss_bussiness");
            $table->timestamp("clibuss_created")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sins_clibuss');
    }
}
