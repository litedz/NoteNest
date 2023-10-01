<?php

namespace notenest\notenest;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use notenest\notenest\Commands\notenestCommand;

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
}
