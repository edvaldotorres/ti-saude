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
        Schema::create('consultations_proceedings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cons_code');
            $table->foreign('cons_code')->references('cons_code')->on('consultations');
            $table->unsignedBigInteger('proc_code');
            $table->foreign('proc_code')->references('proc_code')->on('proceedings');  
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
        Schema::dropIfExists('consultations_proceedings');
    }
};
