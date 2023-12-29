<?php

namespace App\Imports;

use App\Models\Eleve;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Facades\Excel;

class ElevesImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            '6eme' => new EleveSixiemeImport,
            '5eme' => new EleveCinquiemeImport,
            '4eme' => new EleveQuatriemeImport,
            '3eme' => new EleveTroisiemeImport,
        ];
    }
}
