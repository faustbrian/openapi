<?php

declare(strict_types=1);

namespace Tests;

use PreemStudio\Jetpack\TestBench\AbstractTestCase;
use Spatie\LaravelData\LaravelDataServiceProvider;

/**
 * @internal
 */
abstract class TestCase extends AbstractTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelDataServiceProvider::class,
        ];
    }
}
