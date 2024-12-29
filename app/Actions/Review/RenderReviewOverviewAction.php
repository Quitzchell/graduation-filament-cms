<?php

namespace App\Actions\Review;

use App\Actions\Abstracts\TemplateResolver;
use App\Models\Book;
use App\Models\DTO\MovieDTO;
use App\Models\DTO\ReviewDTO;
use App\Models\Movie;
use App\Models\Page;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;

class RenderReviewOverviewAction extends TemplateResolver
{
    public function execute(Page $page): JsonResponse
    {
        $headerItems = [
            'headerImage' => asset('storage/'.$page->content('header_image')),
            'headerTitle' => $page->content('header_title'),
        ];

        $reviewItems = Review::where('published', true)
            ->with('reviewable')
            ->take(10)
            ->get()
            ->map(function (Review $review) {
                $reviewable = $review->reviewable;

                $reviewableDTO = match (get_class($reviewable)) {
                    Movie::class => MovieDTO::make($reviewable),
                    // $reviewable instanceof Book => BookDTO::from($reviewable),
                    default => throw new InvalidArgumentException('Unknown reviewable type'),
                };

                return ReviewDTO::make($review, $reviewableDTO);
            });

        return $this->render($page, [
            'headerItems' => $headerItems,
            'reviewItems' => $reviewItems,
            'blocks' => $this->resolver->execute($page->content('blocks') ?? []),
        ]);
    }
}
