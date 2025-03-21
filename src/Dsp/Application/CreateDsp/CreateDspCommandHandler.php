<?php

declare(strict_types=1);

namespace App\Dsp\Application\CreateDsp;

use App\Dsp\Domain\Dsp;
use App\Dsp\Domain\Repository\DspRepository;
use App\Shared\Infrastructure\Symfony\Messenger\EventBus;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class CreateDspCommandHandler
{
    
    public function __construct(
        private DspRepository $dspRepository,
        private EventBus $eventBus,
    ) {}
    
    public function __invoke(CreateDspCommand $command): void
    {
        $dsp = Dsp::create($command->id, $command->name, $command->code);
        $this->dspRepository->save($dsp);
        
        $this->eventBus->dispatch(...$dsp->pullDomainEvents());
    }
}