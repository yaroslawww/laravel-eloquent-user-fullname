<?php

namespace Angecode\LaravelFullName\Models\Traits;

use Angecode\LaravelFullName\StrHelper;

trait HasFullName
{
    /*protected $fillable = [
        'first_name', 'middle_name', 'last_name',
    ];*/

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getNameAttribute()
    {
        return StrHelper::implodeFiltered([
            $this->{$this->getFirstNameName()},
            $this->{$this->getLastNameName()},
        ]);
    }

    public function getFullNameAttribute()
    {
        return StrHelper::implodeFiltered([
            $this->{$this->getFirstNameName()},
            $this->{$this->getMiddleNameName()},
            $this->{$this->getLastNameName()},
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | INTERNAL ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getFirstNameName()
    {
        return 'first_name';
    }

    public function getMiddleNameName()
    {
        return 'middle_name';
    }

    public function getLastNameName()
    {
        return 'last_name';
    }
}
