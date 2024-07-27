<?php

namespace SvenK\LaravelBase64Images;

use Illuminate\Support\ServiceProvider;

class Base64ImagesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('base64imagehelper', function ($app) {
            return new \SvenK\LaravelBase64Images\Base64ImageHelper;
        });

        $this->mergeConfigFrom(
            __DIR__ . '/../config/base64images.php',
            'base64images'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/base64images.php' => config_path('base64images.php'),
        ], 'config');
    }
}
