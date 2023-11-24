<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable  = [
        'valeur',
        'eleve_id',
        'evaluation_id',
        'trimestre_id'
    ];

    public function eleves()
    {
        return $this->belongsTo(Eleve::class);
    }

    public function trimestres()
    {
        return $this->belongsTo(Trimestre::class);
    }

    public function evaluations()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
