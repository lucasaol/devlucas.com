<?php

namespace Database\Factories;

use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Resume>
 */
class ResumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => '',
            'position' => null,
            'picture' => null,
            'summary' => null,
            'phone' => null,
            'email' => null,
            'website' => null,
            'location' => null
        ];
    }
}
