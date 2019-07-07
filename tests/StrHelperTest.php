<?php

namespace Angecode\LaravelFullName\Tests;

use Angecode\LaravelFullName\StrHelper;
use PHPUnit\Framework\TestCase;

class StrHelperTest extends TestCase
{
    public function test_concat_if_not_empty()
    {
        $result = StrHelper::concatIfNotEmpty([
            'test1',
            'test2',
            'test3',
        ]);

        $this->assertEquals('test1 test2 test3', $result);

        $result = StrHelper::concatIfNotEmpty([
            'test1',
            '',
            'test2',
            null,
            'test3',
        ], '~');

        $this->assertEquals('test1~test2~test3', $result);

        $result = StrHelper::concatIfNotEmpty([], '~');

        $this->assertEquals('', $result);

        $this->expectException(\TypeError::class);
        StrHelper::concatIfNotEmpty('');

        $this->expectException(\ArgumentCountError::class);
        StrHelper::concatIfNotEmpty();

    }

}
