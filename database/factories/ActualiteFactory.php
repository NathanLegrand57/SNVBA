<?php

namespace Database\Factories;

use App\Models\Actualite;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actualite>
 */
class ActualiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Actualite::class;
    public function definition(): array
    {
        return [
            'titre' => $this->faker->realText(20),
            'contenu' => $this->faker->realText(200),
        ];
    }
}
