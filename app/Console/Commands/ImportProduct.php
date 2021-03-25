<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service = app(\App\Service\Import\ImportCategory::class);
        $service->run();
        $service = app(\App\Service\Import\ImportProduct::class);
        $service->run();
        return 0;
    }
}
