<?php

namespace App\Models\Schemas;

use App\Actions\Abstracts\ObjectResolver;

interface HasObjectRenderer
{
    public function getRenderer(): ObjectResolver;
}
