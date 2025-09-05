<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->sentence(rand(5, 10)),
            'content' => $this->faker->paragraphs(rand(5, 15), true),
            'main_image_url' => $this->faker->imageUrl(640, 480, 'blog', true),
        ];
    }
}
