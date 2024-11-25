<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use App\Filament\Resources\ReviewResource;
use App\Filament\Resources\Traits\MutateDataBeforeCreateTrait;
use Filament\Resources\Pages\CreateRecord;

class CreateReview extends CreateRecord
{
    use MutateDataBeforeCreateTrait;

    protected static string $resource = ReviewResource::class;
}
