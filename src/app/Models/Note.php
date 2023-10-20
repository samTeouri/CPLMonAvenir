<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'type',
        'eleve_id',
        'trimestre_id'
    ];

    /**
     *
     *  Récupérer l'élève qui a eu la note
     *
     */
    public function eleve() {
        return $this->belongsTo(Eleve::class);
    }

    /**
     *
     *  Récupérer le trimestre auquel correspond la  note
     *
     */
    public function trimestre() {
        return $this->belongsTo(Trimestre::class);
    }
}
