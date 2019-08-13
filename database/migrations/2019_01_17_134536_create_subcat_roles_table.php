<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcatRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcat_roles', function (Blueprint $table) {
            $table->unsignedInteger('subcategories_id');
            $table->unsignedInteger('roles_id');
            $table->foreign('subcategories_id')->references('id')->on('subcategories')->onDelete('cascade');;
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');;
            $table->primary(['subcategories_id', 'roles_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcat_roles');
    }
}
