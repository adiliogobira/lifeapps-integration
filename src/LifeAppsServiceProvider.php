<?php

namespace Lifeapps\Integra;

use Illuminate\Support\ServiceProvider;

class LifeAppsServiceProvider extends ServiceProvider{
    
    /**
     * Register the service provider.
     *
     * @return void
     */

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/lifeapps.php', 'lifeapps');

        $this->app->singleton(EngineManager::class, function ($app) {
            return new EngineManager($app);
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                ImportCommand::class,
                FlushCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/../config/lifeapps.php' => $this->app['path.config'].DIRECTORY_SEPARATOR.'lifeapps.php',
            ]);
        }
    }
}