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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->integer('niveau_etoile');
            $table->bigInteger('id_membre')->unsigned();
            $table->bigInteger('id_session')->unsigned();
            $table->foreign('id_membre')->references('id')->on('membres')->cascadeOnDelete();
            $table->foreign('id_session')->references('id')->on('sessions')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
