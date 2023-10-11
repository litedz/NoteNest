<?php

namespace notenest\notenest;

use Livewire\Livewire;
use notenest\notenest\Livewire\Note;
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
    public function register()
    {
    }
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'notenest');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/livewire'),
        ], 'notenest-views');
        $this->publishes([
            __DIR__ . '/../resources/js' => resource_path('js'),
        ], 'notenest-js');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/notenest'),
        ], 'notenest-public');


        Livewire::component('Note', Note::class);
    }
}
