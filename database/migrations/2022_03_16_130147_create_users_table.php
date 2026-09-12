<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roles_id');
            $table->string('name');
            $table->integer('age');
            $table->string('birth');
            $table->string('mail')->unique();
            $table->string('tel');
            $table->string('plan');
            $table->integer('experience_month');
            $table->string('skill');
            $table->string('fee')->nullable();
            $table->timestamps();

            $table
            ->foreign('roles_id')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
