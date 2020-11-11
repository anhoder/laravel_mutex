<?php
/**
 * The file is part of the laravel_mutex.
 *
 * (c) alan <alan1766447919@gmail.com>.
 *
 * 2020/11/11 8:31 下午
 */

if (!function_exists('get_command_mutex')) {
    /**
     * Get file mutex path of command in laravel.
     * @param callable $scheduleFunc
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function get_command_mutex(callable $scheduleFunc) {
        /**
         * @var $schedule Illuminate\Console\Scheduling\Schedule
         */
        $schedule = \Illuminate\Container\Container::getInstance()->make((Illuminate\Console\Scheduling\Schedule::class));

        $event = $scheduleFunc($schedule);

        $mutexName = $event->mutexName();

        $parts = array_slice(str_split($hash = sha1($mutexName), 2), 0, 2);
        return implode('/', $parts).'/'.$hash;
    }
}
