<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_naissance',
        'redoublant',
        'classe_id',
    ];

    /**
     *
     *  Récupérer la classe de l'élève
     *
     */
    public function classe() {
        return $this->belongsTo(Classe::class);
    }

    /**
     *
     *  Récupérer les bulletins de l'élève
     *
     */
    public function bulletins() {
        return $this->hasMany(Bulletin::class);
    }
}
