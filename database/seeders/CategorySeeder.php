<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Military Strategy & Tactics'],
            ['name' => 'Leadership & Power'],
            ['name' => 'Personal Reflections'],
            ['name' => 'Travel & Conquest'],
            ['name' => 'Philosophy & Intellectual Pursuits'],
            ['name' => 'Love & Relationships'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
