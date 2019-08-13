<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('users_id');
            $table->boolean('supereditor');
            $table->unsignedInteger('subcategories_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('subcategories_id')->references('id')->on('subcategories')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editors');
    }
}
