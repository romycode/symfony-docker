<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Persistence\Dbal;

use App\Shared\Domain\DomainEvent;
use Doctrine\DBAL\Connection;

final readonly class PostgresDomainEventRepository
{
    public function __construct(private Connection $connection) {}
    
    public function save(DomainEvent $event): void
    {
        $qb = $this->connection->createQueryBuilder();
        
        dump(json_encode($event->payload(), JSON_THROW_ON_ERROR));
        
        $qb
            ->insert('event_store')
            ->values(
                [
                    'id' => ':id',
                    'aggregate_id' => ':aggregate_id',
                    'name' => ':name',
                    'version' => ':version',
                    'payload' => ':payload',
                    'metadata' => ':metadata',
                    'occurred_on' => ':occurred_on',
                    'audit_id' => ':audit_id',
                    'correlation_id' => ':correlation_id',
                ],
            )
            ->setParameters(
                [
                    'id' => $event->id(),
                    'aggregate_id' => $event->aggregateId(),
                    'name' => $event->name(),
                    'version' => $event->version(),
                    'payload' => json_encode($event->payload(), JSON_THROW_ON_ERROR),
                    'metadata' => json_encode($event->metadata(), JSON_THROW_ON_ERROR),
                    'occurred_on' => $event->occurredOn()->format(\DateTimeInterface::RFC3339),
                    'audit_id' => $event->auditId() ?? uniqid(),
                    'correlation_id' => $event->correlationId() ?? uniqid(),
                ],
            )->executeQuery();
    }
}