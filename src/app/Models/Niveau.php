<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'libelle'
    ];

    /**
     *
     *  Récupérer les matières enseignées à ce niveaux
     *
     */
    public function matieres() {
        return $this->belongsToMany(Matiere::class, 'coefficients', 'niveau_id', 'matiere_id')->withPivot('valeur');
    }

    /**
     *
     *  Récupérer les classes du niveau
     *
     */
    public function classes() {
        return $this->hasMany(Classe::class);
    }
}
