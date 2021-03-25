<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        // start session
        $req = $this->app['request'];
        $sessionProp = new \ReflectionProperty($req, 'session');
        $sessionProp->setAccessible(true);
        $sessionProp->setValue($req, $this->app['session']->driver('array'));

        DB::beginTransaction();

        $this->artisan('migrate');

        $this->beforeApplicationDestroyed(function () {
            DB::rollBack();
        });
    }
}
