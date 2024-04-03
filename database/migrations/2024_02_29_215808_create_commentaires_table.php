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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->text('contenu');
            $table->date('date_de_publication');
            $table->bigInteger('membre_id')->unsigned();
            $table->bigInteger('formation_id')->unsigned();
            $table->foreign('membre_id')->references('id')->on('membres')->cascadeOnDelete();
            $table->foreign('formation_id')->references('id')->on('formations')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};
