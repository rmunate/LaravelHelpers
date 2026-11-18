<?php

namespace Helpers\Illuminate\Support\Commands;

use Helpers\Illuminate\Support\Commands\Traits\CommandUtilities;
use Illuminate\Console\Command;

class CreateHelpersFunctions extends Command
{
    use CommandUtilities;

    protected $signature = 'helper:functions';

    protected $description = 'Creates a global functions file in the Helpers directory.';

    public function handle(): int
    {
        return $this->writeHelper('Functions') ? self::SUCCESS : self::FAILURE;
    }
}
