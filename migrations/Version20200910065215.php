<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200910065215 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attributions DROP FOREIGN KEY FK_14C967D2FB88E14F');
        $this->addSql('DROP INDEX UNIQ_14C967D2FB88E14F ON attributions');
        $this->addSql('ALTER TABLE attributions CHANGE utilisateur_id utlisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE attributions ADD CONSTRAINT FK_14C967D24AA36B5 FOREIGN KEY (utlisateur_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_14C967D24AA36B5 ON attributions (utlisateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attributions DROP FOREIGN KEY FK_14C967D24AA36B5');
        $this->addSql('DROP INDEX UNIQ_14C967D24AA36B5 ON attributions');
        $this->addSql('ALTER TABLE attributions CHANGE utlisateur_id utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE attributions ADD CONSTRAINT FK_14C967D2FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_14C967D2FB88E14F ON attributions (utilisateur_id)');
    }
}
