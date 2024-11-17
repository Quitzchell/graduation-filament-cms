<?php

namespace App\Cms\Templates\Interfaces;

use App\Cms\Actions\TemplateResolver;

interface TemplateContract
{
    public static function getForm(): array;

    public function getRenderer(): TemplateResolver;
}
