<?php

namespace marygastro\Modules\Pagina\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'pagina');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'pagina');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'pagina');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
