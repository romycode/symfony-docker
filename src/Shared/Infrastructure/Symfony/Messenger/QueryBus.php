<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Symfony\Messenger;

use App\Shared\Domain\DomainEvent;
use Symfony\Component\Messenger\MessageBusInterface;

final readonly class QueryBus
{
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {}
    
    public function dispatch(DomainEvent $event): void
    {
        $this->messageBus->dispatch($event);
    }
}