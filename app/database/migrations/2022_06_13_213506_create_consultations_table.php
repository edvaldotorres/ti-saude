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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id('cons_code');
            $table->unsignedBigInteger('doc_code');
            $table->foreign('doc_code')->references('doc_code')->on('doctors');
            $table->unsignedBigInteger('pat_code');
            $table->foreign('pat_code')->references('pat_code')->on('patients');
            $table->boolean('consultation_type');
            $table->date('cons_date');
            $table->time('cons_time');
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
        Schema::dropIfExists('consultations');
    }
};
