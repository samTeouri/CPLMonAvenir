<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** Elève 1 */
            /** Anglais */

        Note::create([
            'note' => 12,
            'type' => 'composition',
            'eleve_id' => 1,
            'cours_id' => 1,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 14,
            'type' => 'devoir',
            'eleve_id' => 1,
            'cours_id' => 1,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 11,
            'type' => 'devoir',
            'eleve_id' => 1,
            'cours_id' => 1,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 8,
            'type' => 'interrogation',
            'eleve_id' => 1,
            'cours_id' => 1,
            'trimestre_id' => 1,
        ]);

            /** SVT */

        Note::create([
            'note' => 13,
            'type' => 'composition',
            'eleve_id' => 1,
            'cours_id' => 4,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 16,
            'type' => 'devoir',
            'eleve_id' => 1,
            'cours_id' => 4,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 14,
            'type' => 'devoir',
            'eleve_id' => 1,
            'cours_id' => 4,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 17,
            'type' => 'interrogation',
            'eleve_id' => 1,
            'cours_id' => 4,
            'trimestre_id' => 1,
        ]);

            /** Maths */

        Note::create([
            'note' => 8,
            'type' => 'composition',
            'eleve_id' => 1,
            'cours_id' => 7,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 11,
            'type' => 'devoir',
            'eleve_id' => 1,
            'cours_id' => 7,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 9,
            'type' => 'devoir',
            'eleve_id' => 1,
            'cours_id' => 7,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 6,
            'type' => 'interrogation',
            'eleve_id' => 1,
            'cours_id' => 7,
            'trimestre_id' => 1,
        ]);







        /** Elève 2 */
            /** Anglais */

        Note::create([
            'note' => 16,
            'type' => 'composition',
            'eleve_id' => 2,
            'cours_id' => 2,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 18,
            'type' => 'devoir',
            'eleve_id' => 2,
            'cours_id' => 2,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 13,
            'type' => 'devoir',
            'eleve_id' => 2,
            'cours_id' => 2,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 18,
            'type' => 'interrogation',
            'eleve_id' => 2,
            'cours_id' => 2,
            'trimestre_id' => 1,
        ]);

            /** SVT */

        Note::create([
            'note' => 11,
            'type' => 'composition',
            'eleve_id' => 2,
            'cours_id' => 5,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 14,
            'type' => 'devoir',
            'eleve_id' => 2,
            'cours_id' => 5,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 10,
            'type' => 'devoir',
            'eleve_id' => 2,
            'cours_id' => 5,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 15,
            'type' => 'interrogation',
            'eleve_id' => 2,
            'cours_id' => 5,
            'trimestre_id' => 1,
        ]);

            /** Maths */

        Note::create([
            'note' => 17,
            'type' => 'composition',
            'eleve_id' => 2,
            'cours_id' => 8,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 14,
            'type' => 'devoir',
            'eleve_id' => 2,
            'cours_id' => 8,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 20,
            'type' => 'devoir',
            'eleve_id' => 2,
            'cours_id' => 8,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 6,
            'type' => 'interrogation',
            'eleve_id' => 2,
            'cours_id' => 8,
            'trimestre_id' => 1,
        ]);










        /** Elève 3 */
            /** Anglais */

        Note::create([
            'note' => 6,
            'type' => 'composition',
            'eleve_id' => 3,
            'cours_id' => 3,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 8,
            'type' => 'devoir',
            'eleve_id' => 3,
            'cours_id' => 3,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 5,
            'type' => 'devoir',
            'eleve_id' => 3,
            'cours_id' => 3,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 9,
            'type' => 'interrogation',
            'eleve_id' => 3,
            'cours_id' => 3,
            'trimestre_id' => 1,
        ]);

            /** SVT */

        Note::create([
            'note' => 7,
            'type' => 'composition',
            'eleve_id' => 3,
            'cours_id' => 6,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 3.5,
            'type' => 'devoir',
            'eleve_id' => 3,
            'cours_id' => 6,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 6.25,
            'type' => 'devoir',
            'eleve_id' => 3,
            'cours_id' => 6,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 11,
            'type' => 'interrogation',
            'eleve_id' => 3,
            'cours_id' => 6,
            'trimestre_id' => 1,
        ]);

            /** Maths */

        Note::create([
            'note' => 6,
            'type' => 'composition',
            'eleve_id' => 3,
            'cours_id' => 9,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 7.75,
            'type' => 'devoir',
            'eleve_id' => 3,
            'cours_id' => 9,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 4.5,
            'type' => 'devoir',
            'eleve_id' => 3,
            'cours_id' => 9,
            'trimestre_id' => 1,
        ]);

        Note::create([
            'note' => 7,
            'type' => 'interrogation',
            'eleve_id' => 3,
            'cours_id' => 9,
            'trimestre_id' => 1,
        ]);
    }
}
