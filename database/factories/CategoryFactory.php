<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private $categories = [
        'Web Development',
        'Mobile Development',
        'Desktop Development',
        'Game Development',
        'Machine Learning',
        'Data Science',
        'DevOps',
        'Testing',
        'Design',
        'Management',
    ];

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement($this->categories),
        ];
    }
}
