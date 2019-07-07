<?php

namespace Angecode\LaravelFullName\Traits;

use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;

/**
 * Trait CanPublish.
 *
 * @property $app
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

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'*_add_fullname_to_users_table.php');
            })->push($this->app->databasePath()."/migrations/{$timestamp}_add_fullname_to_users_table.php")
            ->first();
    }
}
