<?php

namespace App\notenest\notenest;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use App\notenest\notenest\Commands\notenestCommand;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;

class notenestServiceProvider extends ServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('notenest')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_notenest_table')
            ->hasCommand(notenestCommand::class);
    }
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        AboutCommand::add('Note Nest', fn () => ['Version' => '1.0.0']);
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'notenest');
        $this->publishes([
            __DIR__ . '../config/notenest.php' => config_path('notenest.php'),
        ]);
    }
}
