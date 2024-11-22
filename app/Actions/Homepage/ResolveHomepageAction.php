<?php

namespace App\Actions\Homepage;

use App\Actions\Abstracts\TemplateResolver;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

class ResolveHomepageAction extends TemplateResolver
{
    public function execute(Page $page, ...$params): JsonResponse
    {
        $headerItems = [
            'headerImage' => asset('storage/'.$page->content('header_image')),
            'headerTitle' => $page->content('header_title'),
        ];

        $this->resolver->execute($page->content('blocks'));

        return $this->render($page, [
            'headerItems' => $headerItems,
            'blocks' => $this->resolver->execute($page->content('blocks')),
        ]);
    }
}