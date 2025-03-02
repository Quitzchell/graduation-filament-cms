<?php

namespace App\Actions\Blog;

use App\Actions\Abstracts\TemplateResolver;
use App\Models\BlogPost;
use App\Models\DTO\BlogPostDTO;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

class RenderBlogOverviewAction extends TemplateResolver
{
    public function execute(Page $page): JsonResponse
    {
        $headerItems = [
            'headerImage' => asset('storage/'.$page->content('header_image')),
            'headerTitle' => $page->content('header_title'),
        ];

        $blogPostItems = BlogPost::where('published', true)->get()->map(function (BlogPost $blogPost) {
            return BlogPostDTO::make($blogPost);
        });

        return $this->render($page, [
            'headerItems' => $headerItems,
            'blogPostItems' => $blogPostItems,
            'blocks' => $this->resolver->execute($page->content('blocks') ?? []),
        ]);
    }
}
