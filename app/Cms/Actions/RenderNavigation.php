<?php

namespace App\Cms\Actions;

use App\Cms\Templates\Homepage\HomepageSchema;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;

class RenderNavigation
{
    public function __invoke(): JsonResponse
    {
        $pages = Menu::find(1)
            ->pages
            ->where('template', '!=', HomepageSchema::class)
            ->map(static fn ($page) => [
                'name' => $page->name,
                'uri' => $page->uri(),
            ])->values();

        return response()->json($pages);
    }
}
