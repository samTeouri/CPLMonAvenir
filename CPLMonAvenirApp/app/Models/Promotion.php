<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    public function trimestres()
    {
        return $this->belongsToMany(Trimestre::class);
    }

    public function matieres()
    {
        return $this->belongsToMany(Matiere::class);
    }

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }

    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }
}
