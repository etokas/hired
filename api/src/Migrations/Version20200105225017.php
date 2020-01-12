<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200105225017 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE job ADD salary_min VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD salary_max VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE job DROP salary');
        $this->addSql('ALTER TABLE job ALTER additional_description DROP NOT NULL');
        $this->addSql('ALTER TABLE job ALTER localisation DROP NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE job ADD salary VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE job DROP salary_min');
        $this->addSql('ALTER TABLE job DROP salary_max');
        $this->addSql('ALTER TABLE job ALTER additional_description SET NOT NULL');
        $this->addSql('ALTER TABLE job ALTER localisation SET NOT NULL');
    }
}
