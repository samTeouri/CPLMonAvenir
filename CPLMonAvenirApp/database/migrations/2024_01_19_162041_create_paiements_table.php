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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->string('motif');
            $table->integer('montant');
            $table->string('methode');
            $table->date('date_paiement');
            $table->integer('annee_scolaire_id');
            $table->integer('eleve_id');
            $table->foreign('annee_scolaire_id')->references('id')->on('annee_scolaires');
            $table->foreign('eleve_id')->references('id')->on('eleves');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
