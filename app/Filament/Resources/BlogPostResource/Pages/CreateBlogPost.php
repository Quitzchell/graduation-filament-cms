<?php

namespace App\Filament\Resources\BlogPostResource\Pages;

use App\Filament\Resources\BlogPostResource;
use App\Filament\Resources\Traits\MutateDataBeforeCreateTrait;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;

class CreateBlogPost extends CreateRecord
{
    use MutateDataBeforeCreateTrait;

    protected static string $resource = BlogPostResource::class;
}
