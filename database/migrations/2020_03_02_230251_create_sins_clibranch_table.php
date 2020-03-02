<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinsClibranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sins_clibranch', function (Blueprint $table) {
            $table->bigIncrements('clibranch_id');
            $table->integer("clibranch_client");
            $table->integer("clibranch_branch");
            $table->timestamp("clibranch_created")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sins_clibranch');
    }
}
