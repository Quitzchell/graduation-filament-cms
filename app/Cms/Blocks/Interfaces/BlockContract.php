<?php

namespace App\Cms\Blocks\Interfaces;

use Filament\Forms\Components\Builder\Block;

interface BlockContract
{
    public static function getBlock(): Block;
}
