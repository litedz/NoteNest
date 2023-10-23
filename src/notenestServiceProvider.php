<?php

namespace notenest\notenest;

use Livewire\Livewire;
use notenest\notenest\Commands\notenestCommand;
use notenest\notenest\Livewire\Note;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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

    public function register()
    {
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'notenest');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/livewire'),
        ], 'notenest-views');
        $this->publishes([
            __DIR__.'/../resources/js' => resource_path('js'),
        ], 'notenest-js');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/notenest'),
        ], 'notenest-public');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'notenest-migrations');

        Livewire::component('Note', Note::class);
    }
}
