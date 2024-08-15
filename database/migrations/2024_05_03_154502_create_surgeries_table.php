<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurgeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgeries', function (Blueprint $table) {
            $table->id();
            $table->string('surgery_slug')->unique();
            $table->string('surgery_name')->index();
            $table->string('doctor_name')->index();
            $table->string('surgery_room');

            $table->string('assistant_surgeon')->nullable();
            $table->string('anesthesia_technician')->nullable();

            $table->timestamp('surgery_time')->nullable();
            $table->time('surgery_term')->nullable();
            $table->string('surgery_info')->nullable();
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
        Schema::dropIfExists('surgeries');
    }
}
