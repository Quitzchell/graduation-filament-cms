<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Napoleon',
                'slug' => 'napoleon',
                'release_year' => 2023,
                'description' => 'An epic that details the chequered rise and fall of French Emperor Napoleon Bonaparte and his relentless journey to power through the prism of his addictive, volatile relationship with his wife, Josephine.',
                'trailer_id' => 'OAZWXUkrjPc',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
