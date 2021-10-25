<?php

namespace Mdigi\LaravelPackageSkeleton\Tests;

use Mdigi\LaravelPackageSkeleton\LaraViewServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaraViewServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__ . '/../database/migrations/CreateTable.php';

        (new \CreateTable)->up();
    }
}