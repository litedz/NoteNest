<?php

<<<<<<< HEAD
namespace App\notenest\notenest\Commands;
=======
namespace notenest\notenest\Commands;
>>>>>>> Fixnest

use Illuminate\Console\Command;

class notenestCommand extends Command
{
    public $signature = 'notenest';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('Notenest Install');

        return self::SUCCESS;
    }
}
