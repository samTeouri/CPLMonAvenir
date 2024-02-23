<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteScolarite extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'annee_scolaire_id',
        'eleve_id'
    ];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }

    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}
