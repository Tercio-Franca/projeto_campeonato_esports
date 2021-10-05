<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampeonatoHasTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonato_has_time', function (Blueprint $table) {
            $table->id();
            $table->foreignId('time_id')->constrained('times');
            $table->foreignId('campeonato_id')->constrained('campeonatos');
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
        Schema::dropIfExists('campeonato_has_time');
    }
}
