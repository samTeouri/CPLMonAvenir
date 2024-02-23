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
        Schema::create('salaires', function (Blueprint $table) {
            $table->id();
            $table->integer('montant');
            $table->integer('prix_heure');
            $table->integer('salaire');
            $table->integer('date_paiement');
            $table->integer('professeur_id');
            $table->foreign('professeur_id')->references('id')->on('professeurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_salaires');
    }
};
