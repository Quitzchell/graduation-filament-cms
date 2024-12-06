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
            ->items
            ->filter(fn ($item) => $item->page->template !== HomeTemplate::class)
            ->map(fn ($item) => [
                'name' => $item->page->name,
                'uri' => $item->page->uri,
            ])->values();

        return response()->json($pages);
    }
}
