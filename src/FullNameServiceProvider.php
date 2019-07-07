<?php

namespace Angecode\LaravelFullName;

use Angecode\LaravelFullName\Traits\CanPublish;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

/**
 * Class FullNameServiceProvider
 * @package Angecode\LaravelFullName
 *
 * @@codeCoverageIgnore
 */
class FullNameServiceProvider extends ServiceProvider
{
    use CanPublish;

    /**
     * Bootstrap the application services.
     */
    public function boot(Filesystem $filesystem)
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/add_fullname_to_users_table.php.stub' => $this->getMigrationFileName($filesystem),
        ], 'migrations');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
