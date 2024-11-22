<?php

namespace App\Http\Controllers;

use App\Cms\Templates\Interfaces\HasFormSchema;
use App\Models\Page;
use Illuminate\Http\Request;

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

        // todo: refactor so objectsResolver can be targeted and receive an identifier
        $template = new $page->template;
        if ($template instanceof HasFormSchema) {
            $renderer = $template->getRenderer(...$segments);

            return $renderer->execute($page);
        }

        abort(404);
    }
}
