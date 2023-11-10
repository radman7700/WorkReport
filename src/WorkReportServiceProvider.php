<?php

namespace Pishgaman\WorkReport;

use Illuminate\Support\ServiceProvider;

class WorkReportServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/Routes/api.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'WorkReportView');

        // Load translations
        $this->loadTranslationsFrom(__DIR__.'/Resources/lang', 'WorkReportLang');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        // Publish configuration (if needed)
        $this->publishes([

        ], 'public');

    }

    public function register()
    {
        // Register services if needed
    }
}
