<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250320155123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create event store table';
    }

    public function up(Schema $schema): void
    {
        if ($schema->hasTable('event_store')) {
            return;
        }
        
        $table = $schema->createTable('event_store');
        $table->addColumn('id', Types::GUID, ['notnull' => true]);
        $table->addColumn('aggregate_id', Types::GUID, ['notnull' => true]);
        $table->addColumn('name', Types::STRING, ['notnull' => true, 'length' => 70]);
        $table->addColumn('version', Types::SMALLINT, ['notnull' => true]);
        $table->addColumn('payload', Types::JSON, ['notnull' => true]); // 'jsonb' => true not available for MySql
        $table->addColumn('metadata', Types::JSON, ['notnull' => true]); // 'jsonb' => true not available for MySql
        $table->addColumn('occurred_on', Types::DATETIME_IMMUTABLE, ['notnull' => true]);
        $table->addColumn('audit_id', Types::GUID, ['notnull' => true]);
        $table->addColumn('correlation_id', Types::GUID, ['notnull' => true]);
        $table->setPrimaryKey(['id']);
        $table->addIndex(
            ['aggregate_id', 'name', 'version', 'occurred_on', 'audit_id', 'correlation_id'],
            'event_store_all_fields_index',
        );
    }

    public function down(Schema $schema): void
    {
        if ($schema->hasTable('event_store')) {
            $schema->dropTable('event_store');
        }
    }
}
