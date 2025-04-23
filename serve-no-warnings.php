<?php
// filepath: /Users/chunhuwq/Work/PHP/LaravelApp/serve-no-warnings.php
error_reporting(E_ALL & ~E_DEPRECATED);

// Load Composer's autoloader first - this is crucial
require_once __DIR__ . '/vendor/autoload.php';

// Then load the application
$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$status = $kernel->handle(
    $input = new Symfony\Component\Console\Input\ArgvInput,
    new Symfony\Component\Console\Output\ConsoleOutput
);

$kernel->terminate($input, $status);

exit($status);
