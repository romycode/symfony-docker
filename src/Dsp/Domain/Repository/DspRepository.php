<?php

declare(strict_types=1);

namespace App\Dsp\Domain\Repository;

use App\Dsp\Domain\Dsp;

interface DspRepository
{
    public function save(Dsp $dsp): void;
}