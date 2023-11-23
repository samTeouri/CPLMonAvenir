<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneesScolaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee_debut',
        'annee_fin',
    ];

    /**
     *
     *  Récupérer les trimestres de l'année scolaire
     *
     */
    public function trimestres() {
        return $this->hasMany(Trimestre::class);
    }
}
