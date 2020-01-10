<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200105193952 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE company_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE company (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, update_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE job ADD company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD teleworking BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD job_link VARCHAR(1000) DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD enabled BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_FBD8E0F8979B1AD6 ON job (company_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE job DROP CONSTRAINT FK_FBD8E0F8979B1AD6');
        $this->addSql('DROP SEQUENCE company_id_seq CASCADE');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP INDEX IDX_FBD8E0F8979B1AD6');
        $this->addSql('ALTER TABLE job DROP company_id');
        $this->addSql('ALTER TABLE job DROP teleworking');
        $this->addSql('ALTER TABLE job DROP job_link');
        $this->addSql('ALTER TABLE job DROP enabled');
    }
}
