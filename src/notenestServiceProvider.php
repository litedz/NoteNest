<?php

namespace notenest\notenest;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use notenest\notenest\Commands\InstallNotenest;
use notenest\notenest\Commands\AboutNoteNestCommand;
use notenest\notenest\Livewire\Note;

class notenestServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot(): void
    {

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallNotenest::class,
                AboutNoteNestCommand::class
            ]);
        }

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'notenest');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/livewire'),
        ], 'notenest-views');
        $this->publishes([
            __DIR__ . '/../resources/js' => resource_path('js'),
        ], 'notenest-js');

        $this->publishes([
            __DIR__ . '/../public' => public_path('notenest'),
        ], 'notenest-public');

        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'notenest-migrations');

        Livewire::component('Note', Note::class);

        Artisan::call('NotenestInstall');
    }
}
