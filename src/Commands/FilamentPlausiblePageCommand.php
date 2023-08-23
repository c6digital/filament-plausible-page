<?php

namespace C6Digital\FilamentPlausiblePage\Commands;

use Illuminate\Console\Command;

class FilamentPlausiblePageCommand extends Command
{
    public $signature = 'filament-plausible-page';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
