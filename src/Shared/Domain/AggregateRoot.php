<?php

declare(strict_types=1);

namespace App\Shared\Domain;

trait AggregateRoot
{
    /** @var DomainEvent[] $events */
    private array $events = [];
    
    public function recordEvent(DomainEvent $event): void
    {
        $this->events[] = $event;
    }
    
    public function pullDomainEvents(): array
    {
        $events = $this->events;
        $this->events = [];
        
        return $events;
    }
}