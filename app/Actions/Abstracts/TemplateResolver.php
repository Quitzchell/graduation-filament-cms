<?php

declare(strict_types=1);

namespace App\Actions\Abstracts;

use App\Actions\Blocks\BlockResolver;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

abstract class TemplateResolver
{
    public function __construct(protected readonly BlockResolver $resolver) {}

    abstract public function execute(Page $page, ...$params): JsonResponse;

    protected function render(Page $page, array $data = []): JsonResponse
    {
        // fixme: realise something for Meta
        return response()->json(array_merge([
            '_template' => strtolower(class_basename($page->template)),
            'meta' => [
                'title' => null,
                'description' => null,
            ],
        ], $data));
    }
}
