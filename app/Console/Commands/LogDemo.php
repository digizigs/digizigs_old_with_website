<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LogDemo extends Command
{
    
    protected $signature = 'digizigs:log';

   
    protected $description = 'This will log a entry every minute to log file';

   
    public function __construct()
    {
        parent::__construct();
    }

    
    public function handle()
    {
        \Log::info('I was here @' . \Carbon\Carbon::now());
    }
}
