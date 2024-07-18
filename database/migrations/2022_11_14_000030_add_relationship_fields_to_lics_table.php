<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLicsTable extends Migration
{
    public function up()
    {
        Schema::table('lics', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_7616248')->references('id')->on('users');
            $table->unsignedBigInteger('head_eng_id')->nullable();
            $table->foreign('head_eng_id', 'head_eng_fk_7614618')->references('id')->on('users');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7598613')->references('id')->on('users');
            $table->unsignedBigInteger('licses_number_id')->nullable();
            $table->foreign('licses_number_id', 'licses_number_fk_7574364')->references('id')->on('tasks');
        });
    }
}
