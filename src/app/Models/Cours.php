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
     *  Récupérer la matière et le niveau du cours
     *
     */
    public function MatieresNiveau() {
        return $this->belongsTo(MatieresNiveau::class);
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
