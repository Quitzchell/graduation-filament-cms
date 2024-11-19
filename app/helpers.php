<?php

use App\Models\Interfaces\HasUrl;
use Illuminate\Support\Facades\File;

if (! function_exists('getUrlableModels')) {
    function getUrlableModels()
    {
        // Fetch all PHP files in the app/Models directory
        return collect(File::allFiles(app_path('Models')))
            ->map(fn ($file) => 'App\\Models\\'.$file->getBasename('.php'))
            ->filter(fn ($className) => class_exists($className)
                && (new ReflectionClass($className))->implementsInterface(HasUrl::class))
            ->values()
            ->all();
    }
}
