<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('languages1_id');
            $table->unsignedInteger('languages2_id');
            $table->unsignedInteger('subcategories_id');
            $table->unsignedInteger('users_id');
            $table->string('name',100)->unique();
            $table->text('words');
            $table->unsignedInteger('number_of_words');

            $table->foreign('languages1_id')->references('id')->on('languages')->onDelete('cascade');;
            $table->foreign('languages2_id')->references('id')->on('languages')->onDelete('cascade');;
            $table->foreign('subcategories_id')->references('id')->on('subcategories')->onDelete('cascade');;
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');;
            $table->timestamps();
            $table->boolean('private')->default(1);
            $table->timestamp('validated')->nullable(true);
            $table->timestamp('deleted')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sets');
    }
}
