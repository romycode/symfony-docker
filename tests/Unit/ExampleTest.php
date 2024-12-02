<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversNothing]
class ExampleTest extends TestCase
{
    #[Test]
    public function shouldReturnTrue()
    {
        self::assertTrue(true);
    }
}
