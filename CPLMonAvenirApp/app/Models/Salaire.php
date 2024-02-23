<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant',
        'date_paiement',
        'salaire',
        'prix_heure',
        'professeur_id'
    ];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
}
