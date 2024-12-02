<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;

#[CoversNothing]
class ExampleTest extends UnitTestCase
{
    #[Test]
    public function shouldReturnTrue()
    {
        self::assertTrue(true);
    }
}
