<?php

namespace App\Cms\Actions;

use App\Cms\Blocks\DTO\BlockData;
use App\Cms\Blocks\Interfaces\BlockContract;

class BlockResolver
{
    public function execute(array $blocks): array
    {
        return array_map([$this, 'resolveBlock'], $blocks);
    }

    private function resolveBlock(array $block): BlockData
    {
        $blockName = implode('\\', array_map('ucfirst', explode('\\', $block['type'])));

        $blockClass = 'App\\CMS\\Blocks\\'.$blockName;
        if (! is_subclass_of($blockClass, BlockContract::class)) {
            throw new \InvalidArgumentException("Class $blockClass must implement BlockContract");
        }

        $resolvedData = $blockClass::resolve($block['data']);

        return new BlockData($blockName, '', $resolvedData);
    }

    private function getBlockClass(string $blockType): string
    {
        $blockName = implode('\\', array_map('ucfirst', explode('\\', $blockType)));

        return 'App\\CMS\\Blocks\\'.$blockName;
    }
}
