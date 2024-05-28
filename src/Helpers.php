<?php

$file_functions = __DIR__ . '/../../../../app/Helpers/Functions.php';

if (file_exists($file_functions) && is_file($file_functions)) {
    require_once($file_functions);
}