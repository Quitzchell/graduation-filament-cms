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

if (! function_exists('getYoutubeVideoId')) {
    function getYouTubeVideoId($url)
    {
        $parsedUrl = parse_url($url);

        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);

            if (isset($queryParams['v'])) {
                return $queryParams['v'];
            }
        }

        if (isset($parsedUrl['path'])) {
            $pathSegments = explode('/', trim($parsedUrl['path'], '/'));
            $videoId = end($pathSegments);

            if (str_contains($videoId, '?')) {
                $videoId = explode('?', $videoId)[0];
            }

            if (str_contains($videoId, '&')) {
                $videoId = explode('&', $videoId)[0];
            }

            return $videoId;
        }

        return null;
    }
}
