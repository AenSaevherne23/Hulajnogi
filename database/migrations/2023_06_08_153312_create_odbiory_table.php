<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateOdbioryTable extends Migration
{
    public function up()
    {
        Schema::create('odbiory', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('hulajnoga_id');
            $table->unsignedBigInteger('pracownik_id');
            $table->unsignedBigInteger('wypozyczenie_id');
            $table->decimal('koszt_wypozyczenia');
            $table->timestamps();

            $table->foreign('hulajnoga_id')->references('id')->on('hulajnogi')->onDelete('cascade');
            $table->foreign('pracownik_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('wypozyczenie_id')->references('id')->on('wypozyczenia')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('odbiory');
    }
}

