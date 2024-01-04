<?php

declare(strict_types=1);

namespace App\Tests\TestSuiteOne;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

final class FooTest extends TestCase
{
    #[Group('a')]
    public function testOne(): void
    {
        self::assertTrue(true);
    }

    #[Group('b')]
    public function testTwo(): void
    {
        self::assertTrue(true);
    }
}
