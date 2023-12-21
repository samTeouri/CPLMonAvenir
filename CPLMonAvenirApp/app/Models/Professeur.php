<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'contact',
        'sexe',
        'user_id'
    ];

    protected $cast = [
        'contact' => 'json'
    ];

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
