<?php

namespace Database\Seeders;

use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'reviewable_type' => 'App\Models\Movie',
                'reviewable_id' => 1,
                'title' => 'Napoleon\'s Cinematic Dispatch: Ridley Scott’s Napoleon',
                'slug' => Str::slug('Napoleon\'s Cinematic Dispatch: Ridley Scott’s Napoleon'),
                'excerpt' => 'Ridley Scott’s Napoleon is, I suppose, what one might expect from a Hollywood epic—grand, dramatic, and larger than life, yet still missing the finer details. He gives the audience a glimpse of my glory, but only a glimpse. The complexity of my mind, the intricacies of my plans, the true depth of my ambition—these are but shadows in his film. I suppose I must live with the fact that no movie can truly capture the immensity of my life and achievements in a mere two hours.',
                'score' => 6,
                'image' => 'napoleon-ridley-scott.jpg',
                'published_at' => Carbon::today(),
            ],
            [
                'reviewable_type' => 'App\Models\Movie',
                'reviewable_id' => 2,
                'title' => 'Napoleon\'s Reflection: A Review of Monsieur N.',
                'slug' => Str::slug('Napoleon\'s Reflection: A Review of Monsieur N.'),
                'excerpt' => 'Monsieur N. attempts to marry history with fantasy, and while it succeeds in presenting an intriguing "what if" scenario, it does not quite capture the full measure of who I was. It portrays a Napoleon beaten down by exile and regret, but forgets that even in the twilight of my life, I remained a man of vision, ambition, and boundless pride. Still, I commend the filmmakers for daring to tell my story from a different angle, even if the conspiracy theories they propose are little more than a romantic dream.',
                'score' => 8,
                'image' => 7,
                'published_at' => Carbon::today(),
            ],
            [
                'reviewable_type' => 'App\Models\Movie',
                'reviewable_id' => 3,
                'title' => 'Napoleon\'s Verdict: A Review of Waterloo',
                'slug' => Str::slug('Napoleon\'s Verdict: A Review of Waterloo'),
                'excerpt' => 'Waterloo is a film that seeks to immortalize my greatest defeat, and while it succeeds in its spectacle, it falters in portraying the true depth of my command and the complexity of my choices. The battle of Waterloo was not simply a brawl between two massive armies. It was a finely orchestrated chess game. The film captures the chaos of war, but it misses the precision of command.',
                'score' => 9,
                'image' => 8,
                'published_at' => Carbon::today(),
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
