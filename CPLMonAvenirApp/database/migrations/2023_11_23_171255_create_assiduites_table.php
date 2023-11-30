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
        Schema::create('assiduites', function (Blueprint $table) {
            $table->id();
            $table->json('retard')->nullable();
            $table->json('absences')->nullable();
            $table->boolean('comportement')->default(true);
            $table->integer('trimestre_id');
            $table->integer('eleve_id');
            $table->foreign('trimestre_id')->references('id')->on('trimestres')->onDelete('cascade');
            $table->foreign('eleve_id')->references('id')->on('eleves')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assiduites');
    }
};
