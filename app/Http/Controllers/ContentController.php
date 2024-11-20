<?php

namespace App\Http\Controllers;

use App\Cms\Templates\Interfaces\HasTemplateSchema;
use App\Models\Page;

class ContentController
{
    public function getIndex($uri = null)
    {
        if (in_array($uri, ['/', null])) {
            $uri = 'home';
        }
        $page = Page::where('uri', $uri)->first();

        if (! $page) {
            abort(404);
        }

        $template = new $page->template;
        if ($template instanceof HasTemplateSchema) {
            $renderer = $template->getRenderer();

            return $renderer->execute($page);
        }

        abort(404);
    }
}
