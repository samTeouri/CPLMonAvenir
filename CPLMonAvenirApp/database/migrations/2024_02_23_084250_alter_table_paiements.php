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
        Schema::table('paiements', function (Blueprint $table) {
            //
            $table->dropColumn('annee_scolaire_id');
            $table->integer('compte_scolarite_id');
            $table->foreign('compte_scolarite_id')->references('id')->on('comptes_scolarites');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paiements', function (Blueprint $table) {
            //
            $table->integer('annee_scolaire_id');
            $table->foreign('annee_scolaire_id')->references('id')->on('annee_scolaires');
            $table->dropColumn('compte_scolarite_id');
        });
    }
};
