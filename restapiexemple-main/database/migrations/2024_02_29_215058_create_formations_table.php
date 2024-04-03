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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->decimal('prix', 8, 2);
            $table->text('contenue');
            $table->boolean('disponibilite');
            $table->date('date_publication');
            $table->string('langue');
            $table->string('image')->nullable();
            $table->string('niveau');
            $table->text('prerequis')->nullable();
            $table->text('objectif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
