<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'code',
    ];

    /**
     *
     *  Récupérer les trimestres de l'année scolaire
     *
     */
    public function trimestres() {
        return $this->hasMany(Trimestre::class);
    }
}
