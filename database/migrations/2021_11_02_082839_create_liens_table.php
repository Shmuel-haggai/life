<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiensTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liens', function (Blueprint $table) {
            $table->id('id');
            $table->string('url');
            $table->string('nom');
            $table->unsignedBigInteger('liste_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('liste_id')->references('id')->on('listes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('liens');
    }
}
