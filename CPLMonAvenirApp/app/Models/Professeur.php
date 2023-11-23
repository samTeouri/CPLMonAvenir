<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professeur extends User
{
    use HasFactory;

    protected $fillable = [
        'niveau_etudes',
        'salaire',
        'user_id',
    ];

    /**
     *
     *  Récupérer les cours disppensés par le professeur
     *
     */
    public function cours() {
        return $this->hasMany(Cours::class);
    }
}
