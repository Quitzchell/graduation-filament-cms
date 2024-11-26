<?php

namespace App\Cms\Templates\Interfaces;

interface HasTemplateSchema
{
    public static function getName(): string;

    public static function getForm(): array;
}
