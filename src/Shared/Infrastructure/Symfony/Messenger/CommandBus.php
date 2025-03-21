<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Symfony\Messenger;

use App\Dsp\Application\Command;
use Symfony\Component\Messenger\MessageBusInterface;

final readonly class CommandBus
{
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {}
    
    public function dispatch(Command $command): void
    {
        $this->messageBus->dispatch($command);
    }
}