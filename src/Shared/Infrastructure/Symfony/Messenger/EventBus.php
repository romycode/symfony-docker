<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Symfony\Messenger;

use App\Shared\Domain\DomainEvent;
use App\Shared\Infrastructure\Persistence\Dbal\PostgresDomainEventRepository;
use Symfony\Component\Messenger\MessageBusInterface;

final readonly class EventBus
{
    public function __construct(
        private PostgresDomainEventRepository $domainEventRepository,
        private MessageBusInterface $messageBus,
    ) {}
    
    public function dispatch(DomainEvent ...$events): void
    {
        foreach ($events as $event) {
            $this->domainEventRepository->save($event);
            $this->messageBus->dispatch($event);
        }
    }
}