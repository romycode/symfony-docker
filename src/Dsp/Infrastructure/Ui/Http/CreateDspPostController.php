<?php

declare(strict_types=1);

namespace App\Dsp\Infrastructure\Ui\Http;

use App\Dsp\Application\CreateDsp\CreateDspCommand;
use App\Shared\Infrastructure\Symfony\Messenger\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
final readonly class CreateDspPostController
{
    public function __construct(private CommandBus $commandBus) {}
    
    #[Route(path: '/dsp', name: 'dsp.create', methods: ['POST'])]
    public function __invoke(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        
        $this->commandBus->dispatch(new CreateDspCommand($data['id'], $data['name'], $data['code']));
        
        return new JsonResponse([]);
    }
}