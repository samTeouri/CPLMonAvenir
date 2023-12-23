<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assiduite extends Model
{
    use HasFactory;

    protected $fillable = [
        'comportement',
        'eleve_id',
        'trimestre_id'
    ];

    protected $cast = [
        'comportement' => 'json'
    ];

    public function retards()
    {
        return $this->hasMany(Retard::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function trimestre()
    {
        return $this->belongsTo(Trimestre::class);
    }

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}
