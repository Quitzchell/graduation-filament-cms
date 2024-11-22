<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogPosts = [
            [
                'title' => 'Battlefield Insights: The Art of Strategy and Tactics in Warfare',
                'slug' => Str::slug('Battlefield Insights: The Art of Strategy and Tactics in Warfare'),
                'excerpt' => 'Today I wish to share with you some profound insights into the military strategies and tactics that have shaped the course of history on the battlefield. Warfare, as you may know, is not merely about brute strength; it is a complex dance of strategy, deception, and swift maneuvering. Allow me to elucidate the principles that have guided my campaigns and shaped my successes.',
                'image' => 'napoleon-war-advice.webp',
                'category_id' => 1,
                'published_at' => Carbon::parse('1806-02-07'),
                'published' => true,
            ],
        ];

        foreach ($blogPosts as $blogPost) {
            BlogPost::create($blogPost);
        }
    }
}
