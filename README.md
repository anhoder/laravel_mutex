Get the file mutex path of command in laravel or lumen.

获取laravel或lumen的命令文件锁路径。

# Usage

1. Install
   ```sh
   composer require alanalbert/laravel_mutex --dev
   ```
2. Code
   ```php
    $path = get_command_mutex(function (\Illuminate\Console\Scheduling\Schedule $schedule) {
        // schedule command
        return $schedule->command('test')->withoutOverlapping()->runInBackground();
    });
   ```
   You can find the file in `storage/framework/cache/data`.


**Different environments will get different paths.**
**不同的运行环境将会得到不同的文件锁路径。**
