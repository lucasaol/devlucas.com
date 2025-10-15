<?php

namespace Database\Seeders;

use App\Models\AboutMe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutMeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutMe::updateOrCreate(
            [ 'id' => 1],
            AboutMe::factory()->make()->toArray()
        );
    }
}
