<?php

namespace App\Actions\Blog;

use App\Actions\Abstracts\ObjectResolver;
use App\Models\BlogPost;
use Illuminate\Http\JsonResponse;

class RenderBlogDetailAction extends ObjectResolver
{
    public function execute(int|string $identifier, ...$params): JsonResponse
    {
        $blogPost = BlogPost::query()->where('id', $identifier)->firstOrFail();

        if (!$blogPost instanceof BlogPost) {
            abort(404);
        }

        return $this->render(BlogPost::class, [
            'title' => $blogPost->content('title'),
            'image' => $blogPost->image('image'),
            'blocks' => $this->resolver->execute($blogPost->content('blocks')),
        ]);
    }
}
