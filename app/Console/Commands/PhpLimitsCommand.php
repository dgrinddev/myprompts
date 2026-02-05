<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Usage:
 *   php artisan debug:php-limits
 *
 * Description:
 *   Displays relevant PHP and Laravel runtime limits related to request size,
 *   execution time, and validation safety.
 */
class PhpLimitsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:php-limits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show relevant PHP and server limits for request and validation safety';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('PHP & Request related limits');
        $this->line(str_repeat('-', 40));

        $this->table(
            ['Setting', 'Value'],
            [
                ['PHP Version', PHP_VERSION],
                ['memory_limit', ini_get('memory_limit')],
                ['max_execution_time', ini_get('max_execution_time') . 's'],
                ['post_max_size', ini_get('post_max_size')],
                ['upload_max_filesize', ini_get('upload_max_filesize')],
                ['max_input_vars', ini_get('max_input_vars')],
                ['max_input_time', ini_get('max_input_time')],
                ['default_socket_timeout', ini_get('default_socket_timeout') . 's'],
            ]
        );

        $this->newLine();

        $this->info('Laravel related info');
        $this->line(str_repeat('-', 40));

        $this->table(
            ['Key', 'Value'],
            [
                ['Environment', app()->environment()],
                ['Debug mode', config('app.debug') ? 'true' : 'false'],
            ]
        );

        return 0;
    }
}
