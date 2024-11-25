<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface HasReview
{
    public function review(): MorphOne;
}
