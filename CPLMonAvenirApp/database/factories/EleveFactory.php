<?php

namespace Database\Factories;

use App\Models\Eleve;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eleve>
 */
class EleveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Eleve::class;

    public function definition(): array
    {

        return [
            // 'nom' => strtoupper($this->faker->lastName),
            // 'prenom' =>  $this->faker->firstName,
            // 'date_naissance' => $this->faker->date,
            // 'lieu_naissance' => $this->faker->city,
            // 'sexe' => $this->faker->randomElement(['M', 'F']),

            // 'contact_tuteur' => json_encode(['nom' => strtoupper($this->faker->lastName), 'prenom' => $this->faker->firstName, 'telephone' => $this->faker->phoneNumber, 'adresse' => $this->faker->address, 'profession' => $this->faker->jobTitle, 'situation_matrimoniale' => 'Célibataire']),

            // 'pere' => json_encode(['nom' => strtoupper($this->faker->lastName), 'prenom' => $this->faker->firstNameMale, 'telephone' => $this->faker->phoneNumber, 'adresse' => $this->faker->address, 'profession' => $this->faker->jobTitle, 'situation_matrimoniale' => 'Marié']),

            // 'mere' => json_encode(['nom' => strtoupper($this->faker->lastName), 'prenom' => $this->faker->firstNameFemale, 'telephone' => $this->faker->phoneNumber, 'adresse' => $this->faker->address, 'profession' => $this->faker->jobTitle, 'situation_matrimoniale' => 'Mariée']),

            // 'sante' => json_encode(['groupe' => 'A+', 'problemes' => 'diabète, problèmes cardiaques', 'restrictions' => 'course, ménage', 'medicaments' => 'Insuline, Ventoline']),

            // 'matricule' => Str::random(8),
            // 'profil' => $this->faker->imageUrl(), // Changez cela en fonction de la manière dont vous stockez les profils
            // 'adresse' => $this->faker->address,
            // 'user_id' => null, // Vous pouvez ajuster cela en fonction de votre logique d'attribution d'utilisateur
        ];
    }
}
