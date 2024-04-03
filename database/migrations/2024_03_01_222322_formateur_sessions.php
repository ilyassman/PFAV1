<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formateur_sessions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_formateur')->unsigned();
            $table->bigInteger('id_session')->unsigned();
            $table->foreign('id_formateur')->references('id')->on('formateurs')->cascadeOnDelete();
            $table->foreign('id_session')->references('id')->on('sessions')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
