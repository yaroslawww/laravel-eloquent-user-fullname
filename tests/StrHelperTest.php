<?php

namespace Angecode\LaravelFullName\Tests;

use PHPUnit\Framework\TestCase;
use Angecode\LaravelFullName\StrHelper;

class StrHelperTest extends TestCase
{
    public function test_concat_filtered_without_callback()
    {
        $result = StrHelper::implodeFiltered([
            'test1',
            'test2',
            'test3',
        ]);

        $this->assertEquals('test1 test2 test3', $result);

        $result = StrHelper::implodeFiltered([
            'foo',
            null,
            'bar',
            '',
        ], '');

        $this->assertEquals('foobar', $result);

        $result = StrHelper::implodeFiltered([
            'test1',
            '',
            'test2',
            null,
            'test3',
        ], '~');

        $this->assertEquals('test1~test2~test3', $result);

        $result = StrHelper::implodeFiltered([], '~');

        $this->assertEquals('', $result);

        $this->expectException(\TypeError::class);
        StrHelper::implodeFiltered('');

        $this->expectException(\ArgumentCountError::class);
        StrHelper::implodeFiltered();
    }

    public function test_concat_filtered_with_callback()
    {
        $result = StrHelper::implodeFiltered([
            'test1',
            'test2',
            'test3',
        ], ' ', function () {
        });

        $this->assertEquals('', $result);

        $result = StrHelper::implodeFiltered([
            'test1',
            'test2',
            'test3',
        ], ' ', function () {
            return true;
        });

        $this->assertEquals('test1 test2 test3', $result);

        $result = StrHelper::implodeFiltered([
            'foo',
            'test',
            'bar',
            'test',
        ], '|', function ($item) {
            return $item == 'test';
        });

        $this->assertEquals('test|test', $result);
    }
}
