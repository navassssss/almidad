<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearStaticCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:static-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all cached static HTML files from public/static';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = public_path('static');
        if (\Illuminate\Support\Facades\File::exists($path)) {
            \Illuminate\Support\Facades\File::cleanDirectory($path);
            $this->info('Static HTML cache cleared successfully.');
        } else {
            $this->info('No static cache found.');
        }
    }
}
