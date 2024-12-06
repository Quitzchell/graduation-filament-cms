<?php

namespace App\Cms\Templates\Interfaces;

interface HasTemplateSchema
{
    public function getName(): string;

    public function getForm(): array;
}
