<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200928111921 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_2FE5CE5D4E271E1');
        $this->addSql('CREATE TEMPORARY TABLE __temp__avenant AS SELECT id, projet_id, mt_htva, mt_tva, mt_ttc FROM avenant');
        $this->addSql('DROP TABLE avenant');
        $this->addSql('CREATE TABLE avenant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, projet_id INTEGER DEFAULT NULL, mt_htva INTEGER NOT NULL, mt_tva INTEGER NOT NULL, mt_ttc INTEGER NOT NULL, CONSTRAINT FK_2FE5CE5D4E271E1 FOREIGN KEY (projet_id) REFERENCES projet (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO avenant (id, projet_id, mt_htva, mt_tva, mt_ttc) SELECT id, projet_id, mt_htva, mt_tva, mt_ttc FROM __temp__avenant');
        $this->addSql('DROP TABLE __temp__avenant');
        $this->addSql('CREATE INDEX IDX_2FE5CE5D4E271E1 ON avenant (projet_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_2FE5CE5D4E271E1');
        $this->addSql('CREATE TEMPORARY TABLE __temp__avenant AS SELECT id, projet_id, mt_htva, mt_tva, mt_ttc FROM avenant');
        $this->addSql('DROP TABLE avenant');
        $this->addSql('CREATE TABLE avenant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, projet_id INTEGER DEFAULT NULL, mt_htva INTEGER NOT NULL, mt_tva INTEGER NOT NULL, mt_ttc INTEGER NOT NULL)');
        $this->addSql('INSERT INTO avenant (id, projet_id, mt_htva, mt_tva, mt_ttc) SELECT id, projet_id, mt_htva, mt_tva, mt_ttc FROM __temp__avenant');
        $this->addSql('DROP TABLE __temp__avenant');
        $this->addSql('CREATE INDEX IDX_2FE5CE5D4E271E1 ON avenant (projet_id)');
    }
}
