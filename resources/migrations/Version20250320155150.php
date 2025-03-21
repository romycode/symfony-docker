<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use DateTimeImmutable;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250320155150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create dsp table';
    }
    
    public function up(Schema $schema): void
    {
        if ($schema->hasTable('dsps')) {
            return;
        }
        
        $table = $schema->createTable('dsps');
        $table->addColumn('id', Types::GUID, ['notnull' => true]);
        $table->addColumn('name', Types::STRING, ['notnull' => true, 'length' => 70]);
        $table->addColumn('code', Types::SMALLINT, ['notnull' => true]);
        $table->addColumn('created_at', Types::DATETIMETZ_IMMUTABLE, ['notnull' => true]);
        $table->addColumn('updated_at', Types::DATETIMETZ_IMMUTABLE, ['notnull' => true]);
        $table->setPrimaryKey(['id']);
        $table->addIndex(['code'], 'dsps_code_index');
    }
    
    public function down(Schema $schema): void
    {
        if ($schema->hasTable('dsps')) {
            $schema->dropTable('dsps');
        }
    }
}
