<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coefficent extends Model
{
    use HasFactory;

    protected $fillable = [
        'matiere_id',
        'niveau_id',
        'valeur'
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
}
