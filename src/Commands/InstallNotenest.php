<?php

namespace notenest\notenest\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

use function Laravel\Prompts\text;

class InstallNotenest extends Command
{
    public $signature = 'NotenestInstall';

    public $description = 'Install Package Notenest';


    public function __invoke()
    {

        $name = text(
            label: 'Project name ?',
            placeholder: 'Laravel',
            default: 'laravel',
            required: true,
        );
        $creationgProject = Carbon::now();
        $author = text('Author Name ?');

    }
}
