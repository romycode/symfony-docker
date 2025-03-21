<?php

declare(strict_types=1);

namespace App\Shared\Domain;

use DateTimeImmutable;

abstract class DomainEvent
{
    private string $id;
    private string $aggregateId;
    private string $version;
    private array $metadata;
    private DateTimeImmutable $occurredOn;
    private ?string $auditId;
    private ?string $correlationId;
    
    abstract function name(): string;
    
    abstract function payload(): array;
    
    protected function __construct(
        string $aggregateId,
        string $id = null,
        string $version = '1',
        array $metadata = [],
        DateTimeImmutable $occurredOn = null,
        string $auditId = null,
        string $correlationId = null,
    ) {
        $this->aggregateId = $aggregateId;
        $this->id = $id ?? number_format(floor(microtime(true) * 1_000_000), 0, '', '');
        $this->version = $version;
        $this->metadata = $metadata;
        $this->occurredOn = $occurredOn ?? new DateTimeImmutable;
        $this->auditId = $auditId;
        $this->correlationId = $correlationId;
    }
    
    public function id(): string
    {
        return $this->id;
    }
    
    public function aggregateId(): string
    {
        return $this->aggregateId;
    }
    
    public function version(): string
    {
        return $this->version;
    }
    
    public function metadata(): array
    {
        return $this->metadata;
    }
    
    public function occurredOn(): DateTimeImmutable
    {
        return $this->occurredOn;
    }
    
    public function auditId(): ?string
    {
        return $this->auditId;
    }
    
    public function correlationId(): ?string
    {
        return $this->correlationId;
    }
}