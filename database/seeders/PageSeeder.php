<?php

namespace Database\Seeders;

use App\Cms\Templates\Blog\Blog;
use App\Cms\Templates\Homepage\Homepage;
use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'name' => 'Home',
                'uri' => 'home',
                'template' => Homepage::class,
            ],
            [
                'name' => 'Blog',
                'uri' => 'blog',
                'template' => Blog::class,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
