<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'coefficient',
        'classe_id',
        'matiere_id',
        'professeur_id',
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
