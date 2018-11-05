<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birthDate')->nullable();
            $table->string('residentStatus');
            $table->string('school')->nullable();
            $table->string('course')->nullable();
            $table->integer('yearLevel')->nullable();
            $table->string('mobileNumber')->unique()->nullable();
            $table->string('emailAddress')->unique()->nullable();
            $table->string('cover_image');
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
        Schema::dropIfExists('co_tenants');
    }
}