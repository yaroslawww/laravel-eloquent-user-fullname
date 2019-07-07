<?php

namespace Angecode\LaravelFullName\Tests;

use PHPUnit\Framework\TestCase;
use Angecode\LaravelFullName\Models\Traits\HasFullName;

class FullNameTest extends TestCase
{
    /** @test */
    public function all_internal_getters_return_valid_names()
    {
        $mock = $this->getMockForTrait(HasFullName::class);

        $this->assertEquals('first_name', $mock->getFirstNameName());
        $this->assertEquals('middle_name', $mock->getMiddleNameName());
        $this->assertEquals('last_name', $mock->getLastNameName());
    }

    /** @test */
    public function name_return_correct_values()
    {
        $mock = $this->getMockForTrait(HasFullName::class);

        // If Null
        $mock->first_name = null;
        $mock->middle_name = null;
        $mock->last_name = null;

        $this->assertEquals('', $mock->getNameAttribute());
        $this->assertEquals('', $mock->getFullNameAttribute());

        // If Empty
        $mock->first_name = '';
        $mock->middle_name = '';
        $mock->last_name = '';

        $this->assertEquals('', $mock->getNameAttribute());
        $this->assertEquals('', $mock->getFullNameAttribute());

        // If First name Not Empty
        $mock->first_name = 'test';
        $mock->middle_name = null;
        $mock->last_name = '';

        $this->assertEquals('test', $mock->getNameAttribute());
        $this->assertEquals('test', $mock->getFullNameAttribute());

        // If Middle name Not Empty
        $mock->first_name = null;
        $mock->middle_name = 'test';
        $mock->last_name = 0;

        $this->assertEquals('', $mock->getNameAttribute());
        $this->assertEquals('test', $mock->getFullNameAttribute());

        // If Last name Not Empty
        $mock->first_name = null;
        $mock->middle_name = '';
        $mock->last_name = 'test';

        $this->assertEquals('test', $mock->getNameAttribute());
        $this->assertEquals('test', $mock->getFullNameAttribute());

        // If All Not Empty
        $mock->first_name = 'test1';
        $mock->middle_name = 'test2';
        $mock->last_name = 'test3';

        $this->assertEquals('test1 test3', $mock->getNameAttribute());
        $this->assertEquals('test1 test2 test3', $mock->getFullNameAttribute());

        // If First And Last Not Empty
        $mock->first_name = 'test1';
        $mock->middle_name = '';
        $mock->last_name = 'test3';

        $this->assertEquals('test1 test3', $mock->getNameAttribute());
        $this->assertEquals($mock->getNameAttribute(), $mock->getFullNameAttribute());
    }
}
