<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200928093142 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avenant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, projet_id INTEGER DEFAULT NULL, mt_htva INTEGER NOT NULL, mt_tva INTEGER NOT NULL, mt_ttc INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_2FE5CE5D4E271E1 ON avenant (projet_id_id)');
        $this->addSql('CREATE TABLE caution (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, typecaution VARCHAR(255) NOT NULL, donneurdecaution VARCHAR(255) NOT NULL, montantcaution INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE projet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, intitule_marche VARCHAR(255) DEFAULT NULL, domaine VARCHAR(255) DEFAULT NULL, montant INTEGER DEFAULT NULL, contrat VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE avenant');
        $this->addSql('DROP TABLE caution');
        $this->addSql('DROP TABLE projet');
    }
}
