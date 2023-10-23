<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatieresNiveau extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_heures',
        'coefficient',
        'matiere_id',
        'niveau_id',
    ];

    /**
     *
     *  Récupérer la matière du coefficient
     *
     */
    public function matiere() {
        return $this->belongsTo(Matiere::class);
    }

    /**
     *
     *  Récupérer le niveau du coefficient
     *
     */
    public function niveau() {
        return $this->belongsTo(Niveau::class);
    }

    /**
     *
     *  Récupérer les cours correspondant à la matière et au niveau
     *
     */
    public function cours() {
        return $this->hasMany(Cours::class);
    }
}
