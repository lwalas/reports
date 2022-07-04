<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220703092226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE export (id INT NOT NULL, export_user_id INT DEFAULT NULL, place_id INT DEFAULT NULL, datetime TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_428C169437A3FE9D ON export (export_user_id)');
        $this->addSql('CREATE INDEX IDX_428C1694DA6A219 ON export (place_id)');
        $this->addSql('CREATE TABLE export_user (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE place (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE export ADD CONSTRAINT FK_428C169437A3FE9D FOREIGN KEY (export_user_id) REFERENCES export_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE export ADD CONSTRAINT FK_428C1694DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE export DROP CONSTRAINT FK_428C169437A3FE9D');
        $this->addSql('ALTER TABLE export DROP CONSTRAINT FK_428C1694DA6A219');
        $this->addSql('DROP TABLE export');
        $this->addSql('DROP TABLE export_user');
        $this->addSql('DROP TABLE filter');
        $this->addSql('DROP TABLE place');
    }
}
