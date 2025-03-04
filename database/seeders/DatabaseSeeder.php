<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MenuSeeder::class,
            PageSeeder::class,
            ContentSeeder::class,
            MenuManagerSeeder::class,
            CategorySeeder::class,
            BlogPostSeeder::class,
            ActorSeeder::class,
            DirectorSeeder::class,
            MovieSeeder::class,
            MovieRelationSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
