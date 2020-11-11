<?php

require "vendor/autoload.php";

// NOTICE: After laravel or lumen app loaded.
$path = get_command_mutex(function (\Illuminate\Console\Scheduling\Schedule $schedule) {
    return $schedule->command('test')->runInBackground()->withoutOverlapping();
});
var_dump($path);
