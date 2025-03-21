<?php

declare(strict_types=1);

namespace App\Dsp\Infrastructure\Persistence\Dbal;

use App\Dsp\Domain\Dsp;
use App\Dsp\Domain\Repository\DspRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Connection;

final readonly class PostgresDspRepository implements DspRepository
{
    public function __construct(private Connection $connection) {}
    
    public function save(Dsp $dsp): void
    {
        $qb = $this->connection->createQueryBuilder();
        
        $qb
            ->insert('dsps')
            ->values(
                [
                    'id' => ':id',
                    'name' => ':name',
                    'code' => ':code',
                    'created_at' => ':createdAt',
                    'updated_at' => ':updatedAt',
                ],
            )
            ->setParameters(
                [
                    'id' => $dsp->id(),
                    'name' => $dsp->name(),
                    'code' => $dsp->code(),
                    'createdAt' => (new DateTimeImmutable)->format(DateTimeImmutable::RFC3339),
                    'updatedAt' => (new DateTimeImmutable)->format(DateTimeImmutable::RFC3339),
                ],
            )
            ->executeQuery();
    }
}