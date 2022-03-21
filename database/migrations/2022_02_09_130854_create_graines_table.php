<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrainesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom',100);
            $table->string('famille',100);
            $table->string('periode_plantation',100);
            $table->string('periode_recolte',100);
            $table->string('conseil',250);
            $table->string('visuel',500);
            $table->string('quantite',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graines');
    }
};
