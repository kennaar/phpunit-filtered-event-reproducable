<?php

declare(strict_types=1);

namespace App\Tests\TestSuiteTwo;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

final class BarTest extends TestCase
{
    #[Group('b')]
    public function testAThing(): void
    {
        self::assertTrue(true);
    }

    #[Group('b')]
    public function testAnotherThing(): void
    {
        self::assertTrue(true);
    }
}
