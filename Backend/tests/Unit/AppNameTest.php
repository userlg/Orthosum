<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AppNameTest extends TestCase
{

    public function test_app_name_is_orthosum(): void
    {
        $appName = 'Orthosum';

        $this->assertEquals('Orthosum', $appName, 'The application name should be Orthosum');
    }
}
