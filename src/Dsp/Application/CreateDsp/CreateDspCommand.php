<?php

declare(strict_types=1);

namespace App\Dsp\Application\CreateDsp;

use App\Dsp\Application\Command;

final readonly class CreateDspCommand implements Command
{
    public function __construct(
        public string $id,
        public string $name,
        public string $code,
    ) {}
}