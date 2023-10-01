<?php

namespace notenest\notenest\Commands;

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
