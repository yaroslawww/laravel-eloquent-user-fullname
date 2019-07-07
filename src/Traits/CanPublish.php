<?php

namespace Angecode\LaravelFullName\Traits;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;

/**
 * Trait CanPublish
 * @package Angecode\LaravelFullName\Traits
 *
 * @@codeCoverageIgnore
 */
trait CanPublish
{

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');
        return Collection::make($this->app->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path . '*_add_fullname_to_users_table.php');
            })->push($this->app->databasePath() . "/migrations/{$timestamp}_add_fullname_to_users_table.php")
            ->first();
    }

}
