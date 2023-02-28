<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
              $table->string('user_id')->nullable();
              $table->string('user_contact')->nullable();
              $table->string('user_name')->nullable();
              $table->string('booking_id')->nullable();
              $table->string('booking_type')->nullable();
              $table->string('booking_status')->nullable();
              $table->datetime('booking_date')->nullable();
              $table->string('booking_time')->nullable();
              $table->string('review')->nullable();
              $table->string('doctor_id')->nullable();
              $table->string('centre_id')->nullable();
              $table->string('payment_id')->nullable();
              $table->string('amount_paid')->nullable();
              $table->string('amount_due')->nullable();
              $table->string('others_json')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
