<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// Para poder generar datos en formato url amigable
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Datos de ejemplo
            // El slug se genera a partir del título, gracias a la clase Str
            'title' => $title = $this->faker->sentence(),
            'slug'  => Str::slug($title),
            'body'  => $this->faker->text(2200),
        ];
    }
}
