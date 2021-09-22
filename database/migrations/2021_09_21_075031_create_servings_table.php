<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // 2021_09_21_075031
    // 2021_09_19_061943
    public function
    up()
    {
        Schema::create('servings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("counter_id")->constrained('counters')->onDelete('cascade');
            $table->foreignId("appointment_id")->constrained('appointments')->onDelete('cascade');
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
        Schema::dropIfExists('servings');
    }
}
