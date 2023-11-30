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
        $evaluation_2 = Evaluation::find(2);
        $eleve_1 = Eleve::find(1);
        $eleve_2 = Eleve::find(2);
        $eleve_3 = Eleve::find(3);
        $eleve_4 = Eleve::find(4);

        $note = Note::create([
            'valeur' => 12.5,
            'trimestre_id' => $trimestre->id,
            'evaluation_id' => $evaluation->id,
            'eleve_id' => $eleve_1->id
        ]);

        $note_2 = Note::create([
            'valeur' => 4.0,
            'trimestre_id' => $trimestre->id,
            'evaluation_id' => $evaluation->id,
            'eleve_id' => $eleve_2->id
        ]);

        $trimestre->notes()->save($note);
        $eleve_1->notes()->save($note);
        $evaluation->notes()->save($note);

        $trimestre->notes()->save($note_2);
        $eleve_2->notes()->save($note_2);
        $evaluation->notes()->save($note_2);

        $note_3 = Note::create([
            'valeur' => 18,
            'trimestre_id' => $trimestre->id,
            'evaluation_id' => $evaluation_2->id,
            'eleve_id' => $eleve_3->id
        ]);

        $note_4 = Note::create([
            'valeur' => 7.5,
            'trimestre_id' => $trimestre->id,
            'evaluation_id' => $evaluation_2->id,
            'eleve_id' => $eleve_4->id
        ]);

        $trimestre->notes()->save($note_3);
        $eleve_3->notes()->save($note_3);
        $evaluation_2->notes()->save($note_3);

        $trimestre->notes()->save($note_4);
        $eleve_4->notes()->save($note_4);
        $evaluation_2->notes()->save($note_4);
    }
}
