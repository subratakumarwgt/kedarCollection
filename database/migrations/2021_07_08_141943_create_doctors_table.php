<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
              $table->string('doc_id')->nullable();
              $table->string('image')->nullable();
              $table->string('specialist')->nullable();
              $table->string('medical_history')->nullable();
              $table->string('degree_json')->nullable();
              $table->string('experience')->nullable();
              $table->string('full_charge')->nullable();
              $table->string('booking_charge')->nullable(); 
              $table->string('review_json')->nullable();
              $table->string('visits_json')->nullable(); 
              $table->string('visit_frequency')->nullable(); 
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
        Schema::dropIfExists('doctors');
    }
}
