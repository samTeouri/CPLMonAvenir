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
        'compte_scolarite_id',
        'eleve_id'
    ];

    public function compteScolarite()
    {
        return $this->belongsTo(CompteScolarite::class);
    }

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}
