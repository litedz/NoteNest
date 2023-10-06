<?php

namespace notenest\notenest;

use Livewire\Livewire;
use notenest\notenest\app\livewire\Note;
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
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/notenest'),
        ]);
        $this->publishes([
            __DIR__ . '/../config/notenest.php' => config_path('notenest.php'),
        ], 'notenest');
        $this->publishes([
            __DIR__ . '/../config/courier.php' => config_path('courier.php'),
        ]);
        Livewire::component('Note', Note::class);
        
    }
}
