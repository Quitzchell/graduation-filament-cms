<?php

namespace Database\Seeders;

use App\Cms\Templates\BlogTemplate;
use App\Cms\Templates\HomeTemplate;
use App\Cms\Templates\ReviewTemplate;
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
                'template' => HomeTemplate::class,
            ],
            [
                'name' => 'Blog',
                'uri' => 'blog',
                'template' => BlogTemplate::class,
            ],
            [
                'name' => 'Review',
                'uri' => 'review',
                'template' => ReviewTemplate::class,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
