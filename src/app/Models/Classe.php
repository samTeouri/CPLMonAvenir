<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'libelle',
        'niveau_id'
    ];

    /**
     *
     *  Récupérer le niveau de la classe
     *
     */
    public function niveau() {
        return $this->belongsTo(Niveau::class);
    }

    /**
     *
     *  Récupérer les cours dispensés dans la classe
     *
     */
    public function cours() {
        return $this->hasMany(Cours::class);
    }

    /**
     *
     *  Récupérer les élèves de la classe
     *
     */
    public function eleves() {
        return $this->hasMany(Eleve::class);
    }
}
