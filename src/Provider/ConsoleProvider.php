<?php
/**
 *
 *  This file is part of kyrne/sylloge
 *
 *  Copyright (c) 2020 Kyrne.
 *
 *  For the full copyright and license information, please view the license.md
 *  file that was distributed with this source code.
 *
 */

namespace Kyrne\Sylloge\Provider;

use Flarum\Foundation\AbstractServiceProvider;
use Kyrne\Sylloge\Console\SendDigest;
use FoF\Console\Providers\ConsoleProvider as Console;
use Illuminate\Console\Scheduling\Schedule;

class ConsoleProvider extends AbstractServiceProvider
{
    public function register()
    {
        if (!defined('ARTISAN_BINARY')) {
            define('ARTISAN_BINARY', 'flarum');
        }

        // Force registering the Schedule as singleton.

        $this->app->register(Console::class);

        $this->app->resolving(Schedule::class, function (Schedule $schedule) {

            $schedule->command('sylloge:send --interval weekly')
                ->weeklyOn(1, '8:00')
                ->onOneServer();
            $schedule->command('sylloge:send --interval daily')
                ->dailyAt('9:00')
                ->onOneServer();
        });
    }
}
