<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trimestre extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'libelle',
        'annee_scolaire_id',
    ];

    /**
     *
     *  Récupérer les bulletins du trimestre
     *
     */
    public function bulletins() {
        return $this->hasMany(Bulletin::class);
    }

    /**
     *
     *  Récupérer l'année scolaire du trimestre
     *
     */
    public function anneeScolaire() {
        return $this->belongsTo(AnneeScolaire::class);
    }
}
