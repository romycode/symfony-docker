<?php

declare(strict_types=1);

namespace App\Dsp\Domain\Event;

use App\Shared\Domain\DomainEvent;

class DspCreated extends DomainEvent
{
    private function __construct(
        private readonly string $aggregateId,
        private readonly string $name,
        private readonly string $code,
    ) {
        parent::__construct($this->aggregateId);
    }
    
    public static function new(
        string $aggregateId,
        string $name,
        string $code,
    ) {
        return new static(
            $aggregateId,
            $name,
            $code,
        );
    }
    
    final public function name(): string
    {
        return 'example.dsp.created';
    }
    
    final public function payload(): array
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
        ];
    }
}