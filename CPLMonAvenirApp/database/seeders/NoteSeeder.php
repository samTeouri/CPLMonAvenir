<?php

namespace Database\Seeders;

use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\Note;
use App\Models\Trimestre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $trimestre = Trimestre::find(13);
        $evaluation = Evaluation::find(1);
        $eleve_1 = Eleve::find(1);
        $eleve_2 = Eleve::find(2);

        $note = Note::create([
            'valeur' => 12.5,
            'trimestre_id' => $trimestre->id,
            'evaluation_id' => $evaluation->id,
            'eleve_id' => $eleve_1->id
        ]);

        $trimestre->notes()->save($note);
        $eleve_1->notes()->save($note);
        $evaluation->notes()->save($note);

        $note_2 = Note::create([
            'valeur' => 7.5,
            'trimestre_id' => $trimestre->id,
            'evaluation_id' => $evaluation->id,
            'eleve_id' => $eleve_2->id
        ]);

        $trimestre->notes()->save($note_2);
        $eleve_2->notes()->save($note_2);
        $evaluation->notes()->save($note_2);
    }
}
