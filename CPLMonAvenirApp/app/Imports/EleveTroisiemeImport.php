<?php

namespace App\Imports;

use App\Models\AnneeScolaire;
use App\Models\Eleve;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EleveTroisiemeImport implements ToCollection
{
    public function collection(Collection $rows)
    {

        $rows->shift();

        $promotion = AnneeScolaire::getAnneeScolaire()->promotions->where('nom', '3')->first();
        $classe = $promotion->classes[0];

        foreach ($rows as $row) {


            if ($row[0]) {
                $eleve = Eleve::create([
                    'nom' => $row[0],
                    'prenom' => $row[1],
                    'date_naissance' => Date::excelToDateTimeObject($row[2])->format('Y-m-d'),
                    'lieu_naissance' => $row[3],
                    'sexe' => $row[4],
                    'adresse' => $row[5],
                ]);

                $eleve->classes()->attach($classe);
            }
        }
    }
}
