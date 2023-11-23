<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retard extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'heure_arrivee',
        'justifie',
        'eleve_id',
        'trimestre_id',
    ];

    /**
     *
     *  Récupérer l'élève ayant accusé le retard
     *
     */
    public function eleve() {
        $this->belongsTo(Eleve::class);
    }

    /**
     *
     *  Récupérer le trimestre pendant lequel l'élève a accusé le retard
     *
     */
    public function trimestre() {
        $this->belongsTo(Trimestre::class);
    }
}
