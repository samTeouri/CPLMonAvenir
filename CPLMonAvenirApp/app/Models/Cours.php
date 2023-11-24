<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'classe_id',
        'professeur_id',
    ];

    public function classes()
    {
        return $this->belongsTo(Classe::class);
    }

    public function professeurs()
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
