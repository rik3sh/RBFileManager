<?php

namespace rik3sh\RBFileManager;

use Illuminate\Support\ServiceProvider;

class FileManagerServiceProvider extends ServiceProvider
{
    public function boot() 
    {
        $this->publishes([
            __DIR__ . '/../config/rbfileconfig.php' => config_path('rbfileconfig.php')
        ]);
    }

    public function register() 
    {
    
    }
}