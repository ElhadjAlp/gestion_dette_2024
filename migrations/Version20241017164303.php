<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017164303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455450FF010 ON client (telephone)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455E7769B0F ON client (surname)');
        $this->addSql('ALTER TABLE "user" ALTER password TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" ALTER password TYPE VARCHAR(25)');
        $this->addSql('DROP INDEX UNIQ_C7440455450FF010');
        $this->addSql('DROP INDEX UNIQ_C7440455E7769B0F');
    }
}
