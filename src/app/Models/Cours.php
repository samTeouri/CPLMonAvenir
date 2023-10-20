<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'libelle',
        'nombre_heures',
        'classe_id',
        'professeur_id',
        'matiere_id'
    ];

    /**
     *
     *  Récupérer la classe où le cours est enseigné
     *
     */
    public function classe() {
        return $this->belongsTo(Classe::class);
    }

    /**
     *
     *  Récupérer le professeur chargé de dispenser le cours
     *
     */
    public function professeur() {
        return $this->belongsTo(Professeur::class);
    }

    /**
     *
     *  Récupérer la matière du cours
     *
     */
    public function matiere() {
        return $this->belongsTo(Matiere::class);
    }

    /**
     *
     *  Récupérer les notes des élèves sur ce cours
     *
     */
    public function notes() {
        return $this->belongsTo(Note::class);
    }
}
