<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->nullable();
            $table->string('status')->nullable();
            $table->string('amount')->nullable();
            $table->string('type')->nullable();
            $table->string('type_id')->nullable();
            $table->string('details_json')->nullable(); 
            $table->string('user_id')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_address')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
