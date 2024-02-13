<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'isbn'=> fake()->isbn13(),
            'title'=> fake()->sentence(5),
            'author'=> fake()->name(),
            'stock'=>fake()->randomNumber(1,15),
            'price'=> fake()->randomFloat(2,9,50),
        ];
    }
}
