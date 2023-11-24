<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'contact_tuteur',
        'matricule',
        'lieu_naissance',
        'profil',
        'adresse'
    ];

    protected $cast = [
        'adresse' => 'json'
    ];


    public function classes()
    {
        return $this->belongsToMany(Classe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assiduites()
    {
        return $this->hasMany(Assiduite::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
