<?php

namespace App\Actions\Navigation;

use App\Cms\Templates\HomeTemplate;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;

class RenderNavigation
{
    public function __invoke(): JsonResponse
    {
        $pages = Menu::find(1)
            ->pages
            ->where('template', '!=', HomeTemplate::class)
            ->map(static fn ($page) => [
                'name' => $page->name,
                'uri' => $page->uri(),
            ])->values();

        return response()->json($pages);
    }
}
