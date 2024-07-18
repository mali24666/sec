<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsfeltsTable extends Migration
{
    public function up()
    {
        Schema::create('esfelts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('city')->nullable();
            $table->string('length')->nullable();
            $table->string('lengtute')->nullable();
            $table->boolean('check_1')->default(0);
            $table->string('cons')->nullable();
            $table->string('esfelt_stuts')->nullable();
            $table->longText('note')->nullable();
            $table->datetime('end_date')->nullable();
            $table->string('link')->nullable();
            $table->boolean('check_2')->default(0)->nullable();
            $table->string('type')->nullable();
            $table->string('delivery')->nullable();
            $table->string('end_esfelt_date')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }
}
