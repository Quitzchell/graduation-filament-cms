<?php

namespace App\Cms\Blocks\Interfaces;

use Filament\Forms\Components\Builder\Block;

interface HasBlockSchema
{
    public static function getBlock(): Block;

    public static function resolve(array $blockData): array;
}
