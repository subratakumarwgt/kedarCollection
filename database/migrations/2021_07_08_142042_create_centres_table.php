<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centres', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
              $table->string('name')->nullable();
              $table->string('address')->nullable();
              $table->string('details')->nullable();
              $table->string('image')->nullable();
              $table->string('doctors_list_json')->nullable(); 
              $table->string('tests_list_json')->nullable();
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
        Schema::dropIfExists('centres');
    }
}
