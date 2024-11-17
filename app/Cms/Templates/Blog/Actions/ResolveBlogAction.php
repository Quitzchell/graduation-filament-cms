<?php

namespace App\Cms\Templates\Blog\Actions;

use App\Cms\Actions\TemplateResolver;
//use App\Models\BlogPost;
//use App\Models\DTO\BlogPostDTO;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

class ResolveBlogAction extends TemplateResolver
{
    public function execute(Page $page, ...$params): JsonResponse
    {
        $headerItems = [
            'headerImage' => asset('storage/'.$page->content('header_image')),
            'headerTitle' => $page->content('header_title'),
        ];

        //        $blogPostItems = BlogPost::where('published', true)->get()->take(10)->map(function (BlogPost $blogPost) {
        //            return BlogPostDTO::make($blogPost);
        //        });

        return $this->render($page, [
            'headerItems' => $headerItems,
            'blocks' => $this->resolver->execute($page->content('blocks')),
        ]);
    }
}
