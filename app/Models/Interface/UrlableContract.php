<?php

namespace App\Models\Interface;

interface UrlableContract
{
    public function uri($lang = null);

    public function url($lang = null);
}
