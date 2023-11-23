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
        Schema::create('matieres_niveaux', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('coefficient');
            $table->integer('nombre_heures');
            $table->foreignId('matiere_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('niveau_id')->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matieres_niveaux');
    }
};
