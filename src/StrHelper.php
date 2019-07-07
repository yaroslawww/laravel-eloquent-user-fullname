<?php

namespace Angecode\LaravelFullName;

class StrHelper
{
    public static function concatIfNotEmpty(array $items, string $glue = ' ')
    {
        return implode(
            $glue,
            array_filter($items)
        );
    }
}
