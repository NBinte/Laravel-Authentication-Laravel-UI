<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('name'); //moderator
            $table->string('label')->nullable();
            $table->timestamps();
        });



        Schema::create('abilities', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('name'); //edit_forum
            $table->string('label')->nullable(); //Edit the Forum
            $table->timestamps();
        });



        Schema::create('ability_role', function (Blueprint $table) {
            
            $table->primary(['role_id', 'ability_id']);
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('ability_id');
            $table->timestamps();


            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');


            $table->foreign('ability_id')
                ->references('id')
                ->on('abilities')
                ->onDelete('cascade');
        });


        Schema::create('role_user', function (Blueprint $table) {
            
            $table->primary(['user_id', 'role_id']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();


            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');


            $table->foreign('role_id')
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
        // Schema::table('roles', function (Blueprint $table) {
        //     //
        // });
    }
}
