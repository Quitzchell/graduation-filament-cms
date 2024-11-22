<?php

namespace App\Cms\Templates\Interfaces;

use App\Actions\Abstracts\ObjectResolver;
use App\Actions\Abstracts\TemplateResolver;

interface HasTemplateRenderer
{
    public function getRenderer(): TemplateResolver|ObjectResolver;
}
