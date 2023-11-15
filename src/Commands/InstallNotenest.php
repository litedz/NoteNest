<?php

namespace notenest\notenest\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;

class InstallNotenest extends Command
{
    public $signature = 'notenest:install';

    public $description = 'Install Package Notenest';

    public function __invoke(): void
    {
        $ProjectName = text(
            label: 'Project name ?',
            placeholder: 'Laravel',
            default: 'laravel',
            required: true,
        );
        $creationgProject = Carbon::now();
        $author = text(label: 'Author Name ?', placeholder: 'Lite Dz', default: 'Unknown');
        $DeadLine = text(
            label: 'DeadLine ?',
            placeholder: '2012/12/12'
        );

        if (! empty($DeadLine)) {

            //check for correct Format
            $checkValidFormat = Carbon::hasFormat($DeadLine, 'Y/m/d');

            if (! $checkValidFormat) {
                warning('invalid formate date');

                while (! $checkValidFormat) {

                    $DeadLine = text('DeadLine ?');
                    $checkValidFormat = Carbon::hasFormat($DeadLine, 'Y/m/d');

                    if (empty($DeadLine)) {
                        $checkValidFormat = true;
                    }
                }
            }
        }

        $infoProject = [
            'author' => $author,
            'Project_created_at' => $creationgProject,
            'DeadLine' => $DeadLine,
            'ProjectName' => $ProjectName,
        ];
        file_put_contents(__DIR__.'/../assets/readMe.txt', json_encode($infoProject));
    }
}
