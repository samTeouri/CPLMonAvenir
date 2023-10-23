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
        Schema::create('retards', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('heure_arrivee');
            $table->boolean('justifie')->nullable();
            $table->string('justification')->nullable();
            $table->foreignId('eleve_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('trimestre_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retards');
    }
};
