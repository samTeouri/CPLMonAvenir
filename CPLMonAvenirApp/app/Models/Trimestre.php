<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trimestre extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule',
        'courant'
    ];

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class);
    }

    public function eleves()
    {
        return $this->belongsToMany(Eleve::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function assiduites()
    {
        return $this->hasMany(Assiduite::class);
    }
}
