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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('professeur_id')->nullable();
            $table->integer('coefficient');
            $table->integer('classe_id');
            $table->integer('matiere_id');
            $table->foreign('matiere_id')->references('id')->on('matieres');
            $table->foreign('professeur_id')->references('id')->on('professeurs');
            $table->foreign('classe_id')->references('id')->on('classes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
