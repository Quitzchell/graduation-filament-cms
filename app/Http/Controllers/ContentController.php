<?php

namespace App\Http\Controllers;

use App\Models\Page;

class ContentController
{
    public function getIndex($uri = null)
    {
        if (in_array($uri, ['/', null])) {
            $uri = 'home';
        }
        $page = Page::where('uri', $uri)->get();

        dd($page);

        abort(404);
    }
}
