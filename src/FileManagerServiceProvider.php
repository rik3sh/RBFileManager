<?php

namespace rik3sh\RBFileManager;

use Illuminate\Support\ServiceProvider;

class FileManagerServiceProvider extends ServiceProvider
{
    public function boot() 
    {
        $source = realpath($raw = __DIR__.'/../config/rbfileconfig.php') ?: $raw;

        $this->publishes([$source => config_path('rbfileconfig.php')]);
    }

    public function register() 
    {
    
    }
}