<?php

namespace Database\Factories;

use App\Models\AboutMe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AboutMe>
 */
class AboutMeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => '',
            'caption' => null,
            'avatar' => '',
            'introduction' => null,
            'content' => '',
            'picture' => null
        ];
    }
}
