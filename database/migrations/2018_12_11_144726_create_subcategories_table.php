<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('categories_id');
            $table->string('name',100);
            $table->text('description');
            $table->string('picture_file_name',100);
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');;
            //$table->unique('categories_id','name');
            $table->timestamps();
            $table->boolean('hidden')->default(true);
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
        Schema::dropIfExists('subcategories');
    }
}
