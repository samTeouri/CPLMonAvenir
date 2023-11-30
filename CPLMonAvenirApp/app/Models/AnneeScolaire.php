<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee',
        'courant'
    ];

    public static function getAnneeScolaire()
    {
        return AnneeScolaire::where('courant', true)->first();
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
}
