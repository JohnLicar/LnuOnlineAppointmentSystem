<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string("queuing_number");
            $table->foreignId("service_id")->constrained('services');;
            $table->date('scheduled_date');
            $table->string("first_name");
            $table->string("middle_name");
            $table->string("last_name");
            $table->foreignId('course_id')->constrained('courses');
            $table->string('email');
            $table->string('contact_number');
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
        Schema::dropIfExists('appointments');
    }
}
