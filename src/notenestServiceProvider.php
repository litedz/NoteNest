<?php

namespace App\notenest\notenest;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use App\notenest\notenest\Commands\notenestCommand;

class notenestServiceProvider extends PackageServiceProvider
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
        $this->publishes([
            __DIR__ . '../config/notenest.php' => config_path('notenest.php'),
        ]);
        
    }
}
