<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'promotion_id',
        'professeur_id'
    ];

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function eleves()
    {
        return $this->belongsToMany(Eleve::class);
    }

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
}
