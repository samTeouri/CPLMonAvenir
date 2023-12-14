<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retard extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'heure_arrive',
        'justification',
        'assiduite_id',
    ];

    public function assiduite()
    {
        return $this->belongsTo(Assiduite::class);
    }
}
