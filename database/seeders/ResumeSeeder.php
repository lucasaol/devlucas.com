<?php

namespace Database\Seeders;

use App\Models\Resume;
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resume::updateOrCreate(
            [ 'id' => 1],
            Resume::factory()->make()->toArray()
        );
    }
}
