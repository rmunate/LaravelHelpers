<?php

namespace Helpers\Illuminate\Support\Commands;

use Helpers\Illuminate\Support\Commands\Traits\CommandUtilities;
use Illuminate\Console\Command;
use ParseError;

class CreateHelpers extends Command
{
    use CommandUtilities;

    protected $signature = 'helper:create {name}';

    protected $description = 'Create a new class that contains all the helpers of a single category.';

    // TOKEN_PARSE does not catch reserved class names checked later by the compiler.
    private const RESERVED_NAMES = [
        'bool', 'false', 'float', 'int', 'iterable', 'mixed', 'never', 'null',
        'object', 'parent', 'self', 'string', 'true', 'void',
        'functions', 'aux', 'con', 'nul', 'prn',
    ];

    public function handle(): int
    {
        $name = $this->argument('name');

        if (! preg_match('/\A[A-Za-z]+\z/', $name)) {
            $this->error('A helper class name must contain only ASCII letters and no spaces.');

            return self::INVALID;
        }

        $class = self::NATIVE_CLASSES[strtolower($name)] ?? ucfirst($name);

        try {
            token_get_all('<?php class '.$class.' {}', TOKEN_PARSE);
        } catch (ParseError) {
            $this->error("The helper class name [$class] is a PHP keyword.");

            return self::INVALID;
        }

        if (in_array(strtolower($class), self::RESERVED_NAMES, true)) {
            $this->error("The helper class name [$class] is reserved.");

            return self::INVALID;
        }

        return $this->writeHelper($class) ? self::SUCCESS : self::FAILURE;
    }
}
