<?php

namespace Helpers\Illuminate\Support\Commands;

use Helpers\Illuminate\Support\Commands\Traits\CommandUtilities;
use Illuminate\Console\Command;

class GenerateHelpers extends Command
{
    use CommandUtilities;

    protected $signature = 'helper:init';

    protected $description = 'Generate the default helper classes in the application Helpers directory.';

    public function handle(): int
    {
        $status = self::SUCCESS;

        foreach (self::NATIVE_CLASSES as $class) {
            if (!$this->writeHelper($class, skipExisting: true)) {
                $status = self::FAILURE;
            }
        }

        return $status;
    }
}
