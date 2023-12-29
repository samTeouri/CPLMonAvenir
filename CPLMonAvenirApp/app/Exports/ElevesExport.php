<?php

namespace App\Exports;

use App\Models\Eleve;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ElevesExport implements WithHeadings, WithMapping, FromQuery
{


    public function headings(): array
    {
        return [
            ['N°', 'Nom', 'Prénom', 'Date de naissance', 'Sexe', 'Adresse'],
        ];
    }

    public function query()
    {
        return Eleve::query();
    }

    public function map($eleve): array
    {
        return [
            $eleve->id,
            $eleve->nom,
            $eleve->prenom,
            $eleve->date_naissance,
            $eleve->sexe,
            $eleve->adresse

        ];
    }
}
