<?php

namespace Khaleds\Payment;

use Illuminate\Support\ServiceProvider;


class PaymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \Khaleds\Payment\Console\PaymentInstall::class,
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/nafezly-payments.php', 'nafezly-payments');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/nafezly-payments.php' => config_path('nafezly-payments.php'),
        ], 'payment-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'payment-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'payment');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/payment'),
        ], 'payment-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'payment');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => app_path('lang/vendor/payment'),
        ], 'payment-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    }

    public function boot(): void
    {
        //you boot methods here
    }
}
