<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200928135928 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tournament_entry ADD COLUMN planemodel VARCHAR(255) NOT NULL DEFAULT ""');
        $this->addSql('ALTER TABLE tournament_entry ADD COLUMN flightduration DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE tournament_entry ADD COLUMN participant VARCHAR(255) NOT NULL DEFAULT ""');
        $this->addSql('ALTER TABLE tournament_entry ADD COLUMN date DATE NOT NULL DEFAULT ""');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__tournament_entry AS SELECT id, traveldistance FROM tournament_entry');
        $this->addSql('DROP TABLE tournament_entry');
        $this->addSql('CREATE TABLE tournament_entry (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, traveldistance DOUBLE PRECISION NOT NULL)');
        $this->addSql('INSERT INTO tournament_entry (id, traveldistance) SELECT id, traveldistance FROM __temp__tournament_entry');
        $this->addSql('DROP TABLE __temp__tournament_entry');
    }
}
