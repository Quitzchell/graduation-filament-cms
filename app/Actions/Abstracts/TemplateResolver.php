<?php

declare(strict_types=1);

namespace App\Actions\Abstracts;

use App\Actions\Blocks\BlockResolver;
use App\Cms\Templates\Interfaces\HasTemplateSchema;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

abstract class TemplateResolver
{
    public function __construct(protected readonly BlockResolver $resolver) {}

    abstract public function execute(Page $page): JsonResponse;

    protected function render(Page $page, array $data = []): JsonResponse
    {
        // todo: realise something for Meta
        $templateClass = new ($page->template);

        if (! $templateClass instanceof HasTemplateSchema) {
            abort(404);
        }

        return response()->json(array_merge([
            '_template' => strtolower($templateClass->getName()),
            'meta' => [
                'title' => null,
                'description' => null,
            ],
        ], $data));

    }
}
