<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'libelle'
    ];

    /**
     *
     *  Récupérer les niveaux où la matière est enseignée
     *
     */
    public function niveaux() {
        return $this->belongsToMany(Niveau::class, 'matieres_niveaux', 'matiere_id', 'niveau_id')->withPivot('valeur');
    }
}
