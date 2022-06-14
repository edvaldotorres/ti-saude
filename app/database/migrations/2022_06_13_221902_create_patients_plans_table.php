<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients_plans', function (Blueprint $table) {
            $table->id();
            $table->string('pp_contract');
            $table->unsignedBigInteger('pat_code');
            $table->foreign('pat_code')->references('pat_code')->on('patients');
            $table->unsignedBigInteger('hp_code');
            $table->foreign('hp_code')->references('hp_code')->on('health_plans');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients_plans');
    }
};
