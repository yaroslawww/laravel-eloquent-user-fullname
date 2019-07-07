<?php

namespace Angecode\LaravelFullName\Models\Traits;

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
        return implode(
            ' ',
            array_filter(
                [
                    $this->{$this->getFirstNameName()},
                    $this->{$this->getLastNameName()},
                ]
            )
        );
    }

    public function getFullNameAttribute()
    {
        return implode(
            ' ',
            array_filter(
                [
                    $this->{$this->getFirstNameName()},
                    $this->{$this->getMiddleNameName()},
                    $this->{$this->getLastNameName()},
                ]
            )
        );
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
