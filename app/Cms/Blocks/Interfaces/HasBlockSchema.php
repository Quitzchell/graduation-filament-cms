<?php

namespace App\Cms\Blocks\Interfaces;

use Filament\Forms\Components\Builder\Block;

interface HasBlockSchema
{
    public static function getNamespace(): string;
    public static function getBlock(): Block;

    public function resolve(array $blockData): array;
}
