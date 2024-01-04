<?php

declare(strict_types=1);

namespace App\Tests\TestSuiteTwo;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

final class FooTest extends TestCase
{
    #[Group('b')]
    public function testSomething(): void
    {
        self::assertTrue(true);
    }

    #[Group('a')]
    public function testSomethingElse(): void
    {
        self::assertTrue(true);
    }
}
