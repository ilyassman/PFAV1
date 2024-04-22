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
        Schema::create('ecoles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('logo');
            $table->string('video');
            $table->text('propos');
            $table->string('domaine');
            $table->string('numero_whatsapp');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('email');
            $table->timestamps();
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
