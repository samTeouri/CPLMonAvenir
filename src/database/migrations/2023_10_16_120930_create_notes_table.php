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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->decimal('note');
            $table->enum('type', ['interrogation', 'devoir', 'composition']);
            $table->foreignId('eleve_id')->constrained()->noActionOnDelete()->cascadeOnDelete();
            $table->foreignId('cours_id')->constrained()->noActionOnDelete()->cascadeOnDelete();
            $table->foreignId('trimestre_id')->constrained()->noActionOnDelete()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
