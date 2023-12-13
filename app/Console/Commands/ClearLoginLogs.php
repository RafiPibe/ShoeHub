<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ClearLoginLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear user login logs older than 30 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $logPath = storage_path('logs/login.log');
        $logs = File::get($logPath);

        // Check if the log file exists and is not empty
        if ($logs !== false && !empty($logs)) {
            File::put($logPath, '');

            $this->info('User login logs cleared successfully.');
        } else {
            $this->error('Failed to read the log file or the file is empty.');
        }
    }
}
