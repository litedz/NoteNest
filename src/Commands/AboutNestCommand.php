<?php

namespace notenest\notenest\Commands;

use Illuminate\Console\Command;

class AboutNestCommand extends Command
{

    public $signature = 'AboutNest';

    public $description = 'Test commande';


    public function __invoke()
    {
        $this->info('Author : LiteDz');
        $this->info('----------------------------------------------');
        $this->info('Link facebook : https://www.facebook.com/');
        $this->info('----------------------------------------------');
        $this->info('Description: NoteNest is laravel package created with PHP and Livewire, seamlessly integrated with Alpine.js, designed to simplify and enhance your note-taking capabilities Throughout your work on the project');
        $this->info('----------------------------------------------');
        $this->warn('Note: Dont use this package in production mode');
    }
}
