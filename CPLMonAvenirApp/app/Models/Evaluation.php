<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule',
        'type',
        'date',
        'note_maximale',
        'cours_id'
    ];

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
