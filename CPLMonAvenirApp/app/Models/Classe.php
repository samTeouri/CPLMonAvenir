<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'promotion_id'
    ];

    public function promotions()
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
}
