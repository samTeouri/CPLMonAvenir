<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'motif',
        'montant',
        'methode',
        'date_paiement',
        'annee_scolaire',
        'eleve_id'
    ];

    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}
