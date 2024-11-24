<?php

namespace App\Actions\Review;

use App\Actions\Abstracts\ObjectResolver;
use App\Models\DTO\MovieDTO;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;

class RenderReviewDetailAction extends ObjectResolver
{
    public function execute(array $segments): JsonResponse
    {
        try {
            $review = Review::query()->where('slug', $segments[1])->firstOrFail();
        } catch (ModelNotFoundException $e) {
            abort(404, 'Review not found');
        }

        $reviewable = $review->reviewable;

        $reviewableDTO = match (true) {
            $reviewable instanceof Movie => MovieDTO::make($reviewable),
            // $reviewable instanceof Book => BookDTO::from($reviewable),
            default => throw new InvalidArgumentException('Unknown reviewable type'),
        };

        return $this->render(Review::class, [
            'title' => $review->title,
            'image' => asset('storage/'.$review->image),
            'reviewItem' => $reviewableDTO,
            'blocks' => $this->resolver->execute($review->content('blocks') ?? []),
        ]);
    }
}
