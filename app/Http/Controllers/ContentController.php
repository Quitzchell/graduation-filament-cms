<?php

namespace App\Http\Controllers;

use App\Actions\Blog\RenderBlogDetailAction;
use App\Actions\Blog\RenderBlogOverviewAction;
use App\Actions\Homepage\RenderHomepageAction;
use App\Actions\Review\RenderReviewDetailAction;
use App\Actions\Review\RenderReviewOverviewAction;
use App\Cms\Templates\BlogTemplate;
use App\Cms\Templates\HomeTemplate;
use App\Cms\Templates\ReviewTemplate;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ContentController
{
    public function getIndex(Request $request, $uri = null)
    {
        if (in_array($uri, ['/', null])) {
            $uri = 'home';
        }

        $segments = explode('/', $uri);

        $page = Page::where('uri', $segments[0])->first();

        if (! $page) {
            abort(404);
        }

        try {
            return App::call([$this, $this->resolveMethodForTemplate($page->template)], [
                'page' => $page,
                'segments' => $segments,
            ]);
        } catch (\InvalidArgumentException $e) {
            abort(404);
        }
    }

    private function resolveMethodForTemplate(string $template): string
    {
        return match ($template) {
            HomeTemplate::class => 'getHomepage',
            BlogTemplate::class => 'getBlog',
            ReviewTemplate::class => 'getReview',
            default => throw new \InvalidArgumentException('Invalid template'),
        };
    }

    public function getHomepage(
        Page $page,
        RenderHomepageAction $action
    ): JsonResponse {
        return $action->execute($page);
    }

    public function getBlog(
        Page $page,
        Request $request,
        array $segments,
        RenderBlogOverviewAction $overviewAction,
        RenderBlogDetailAction $detailAction
    ): JsonResponse {
        if (count($segments) === 1) {
            return $overviewAction->execute($page);
        }

        return $detailAction->execute($segments);
    }

    public function getReview(
        Page $page,
        Request $request,
        array $segments,
        RenderReviewOverviewAction $overviewAction,
        RenderReviewDetailAction $detailAction): JsonResponse
    {
        if (count($segments) === 1) {
            return $overviewAction->execute($page);
        }

        return $detailAction->execute($segments);
    }
}
