<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversNothing]
final class ExampleTest extends TestCase
{
    #[Test]
    public function shouldReturnTrue(): void
    {
        self::assertTrue(true);
    }
}
