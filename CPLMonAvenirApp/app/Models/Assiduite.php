<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assiduite extends Model
{
    use HasFactory;

    protected $fillable = [
        'retard',
        'absences',
        'comportement',
        'eleve_id',
        'trimestre_id'
    ];

    protected $cast = [
        'retard' => 'json',
        'absences' => 'json'
    ];

    public function trimestres()
    {
        return $this->belongsTo(Trimestre::class);
    }

    public function eleves()
    {
        return $this->belongsTo(Eleve::class);
    }
}
