<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    private static $migration_has_run = false;

    protected function setUp(): void
    {
        parent::setUp();
        if ( !self::$migration_has_run )
        {
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed');
            self::$migration_has_run = true;
        }
    }
}
