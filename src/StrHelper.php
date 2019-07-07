<?php

namespace Angecode\LaravelFullName;

class StrHelper
{
    public static function implodeFiltered(array $items, string $glue = ' ', callable $callback = null)
    {
        return implode(
            $glue,
            ($callback) ? array_filter($items, $callback) : array_filter($items)
        );
    }
}
