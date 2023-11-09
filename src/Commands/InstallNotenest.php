<?php

namespace notenest\notenest\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

use function Laravel\Prompts\text;

class InstallNotenest extends Command
{
    public $signature = 'notenest:install';

    public $description = 'Install Package Notenest';


    public function __invoke() :void
    {
        $ProjectName = text(
            label: 'Project name ?',
            placeholder: 'Laravel',
            default: 'laravel',
            required: true,
        );
        $creationgProject = Carbon::now();
        $author = text('Author Name ?');
        $DeadLine = text('DeadLine ?');

        $infoProject = array(
            'author' => $author,
            'Project_created_at' => $creationgProject,
            'DeadLine' => $DeadLine,
            'ProjectName' => $ProjectName
        );

        file_put_contents(__DIR__ . '/../assets/readMe.txt', json_encode($infoProject));
    }
}
