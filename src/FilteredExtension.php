<?php

declare(strict_types=1);

namespace App;

use PHPUnit\Event\TestSuite\Filtered;
use PHPUnit\Event\TestSuite\FilteredSubscriber;
use PHPUnit\Runner\Extension\Extension;
use PHPUnit\Runner\Extension\Facade;
use PHPUnit\Runner\Extension\ParameterCollection;
use PHPUnit\TextUI\Configuration\Configuration;

final class FilteredExtension implements Extension
{
    public function bootstrap(Configuration $configuration, Facade $facade, ParameterCollection $parameters): void
    {
        $facade->registerSubscriber(
            new class implements FilteredSubscriber {
                public function notify(Filtered $event): void
                {
                    if ($event->testSuite()->count() !== $event->testSuite()->tests()->count()) {
                        print '-----------------------------------------------------------------' . PHP_EOL;
                        print 'Event: ' .  $event->asString() . PHP_EOL . PHP_EOL;
                        print 'Count does not match.' . PHP_EOL;
                        print '$event->testSuite()->count() = ' . $event->testSuite()->count() . PHP_EOL;
                        print '$event->testSuite()->tests()->count() = ' . $event->testSuite()->tests()->count() . PHP_EOL . PHP_EOL;
                        print 'ALL tests are returned from $event->testSuite()->tests(). Expected only the tests which passed the filter.' . PHP_EOL;
                        foreach ($event->testSuite()->tests() as $test) {
                            print $test->id() . PHP_EOL;
                        }
                        print '-----------------------------------------------------------------' . PHP_EOL;
                    }
                }
            }
        );
    }
}
