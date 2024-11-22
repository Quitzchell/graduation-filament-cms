<?php

declare(strict_types=1);

namespace App\Actions\Abstracts;

use App\Actions\Blocks\BlockResolver;
use Illuminate\Http\JsonResponse;

abstract class ObjectResolver
{
    public function __construct(protected readonly BlockResolver $resolver) {}

    abstract public function execute(string|int $identifier, ...$params): JsonResponse;

    protected function render($class, array $data = []): JsonResponse
    {
        return response()->json(array_merge([
            '_object' => strtolower(class_basename($class)),
        ], $data));
    }
}
