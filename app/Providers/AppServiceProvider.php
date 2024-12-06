<?php

namespace App\Providers;

use App\Cms\TemplateFactory;
use App\Cms\Templates\BlogTemplate;
use App\Cms\Templates\HomeTemplate;
use App\Cms\Templates\ReviewTemplate;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TemplateFactory::class, function () {
            return new TemplateFactory([
                HomeTemplate::class => new HomeTemplate,
                BlogTemplate::class => new BlogTemplate,
                ReviewTemplate::class => new ReviewTemplate,
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->updatePHPIniFromConfig();

        app(UrlGenerator::class)->forceScheme('https');
        app(UrlGenerator::class)->forceRootUrl(config('app.asset_url'));
    }

    /**
     * Sets specific PHP ini parameters based on ENV values
     */
    private function updatePHPIniFromConfig(): void
    {
        foreach (config('phpini', []) as $param => $value) {
            ini_set($param, $value);
        }
    }
}
