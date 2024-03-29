<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $genreTypes = [
            'триллер',
            'мелодрама',
            'боевик',
            'драма',
            'ужасы',
            'вестерн',
            'приключение',
            'фантастика',
        ];

        return [
            'title' => $this->faker->randomElement($genreTypes),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
