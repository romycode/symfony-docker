<?php

declare (strict_types=1);

namespace App\Dsp\Domain;

use App\Dsp\Domain\Event\DspCreated;
use App\Shared\Domain\AggregateRoot;

final class Dsp
{
    use AggregateRoot;
    
    private function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly string $code,
    ) {}
    
    public static function create(string $id, string $name, string $code): self
    {
        $dsp = new self($id, $name, $code);
        $dsp->recordEvent(DspCreated::new($id, $name, $code));
        return $dsp;
    }
    
    public function id(): string
    {
        return $this->id;
    }
    
    public function name(): string
    {
        return $this->name;
    }
    
    public function code(): string
    {
        return $this->code;
    }
}