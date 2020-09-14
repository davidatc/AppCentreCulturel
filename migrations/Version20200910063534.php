<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200910063534 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordinateurs (id INT AUTO_INCREMENT NOT NULL, identifiant VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaires (id INT AUTO_INCREMENT NOT NULL, horaires VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attributions (id INT AUTO_INCREMENT NOT NULL, ordinateur_id INT NOT NULL, utilisateur_id INT NOT NULL, horaires_id INT NOT NULL, date DATE NOT NULL, UNIQUE INDEX UNIQ_14C967D2828317CA (ordinateur_id), UNIQUE INDEX UNIQ_14C967D2FB88E14F (utilisateur_id), INDEX IDX_14C967D28AF49C8B (horaires_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attributions ADD CONSTRAINT FK_14C967D2828317CA FOREIGN KEY (ordinateur_id) REFERENCES ordinateurs (id)');
        $this->addSql('ALTER TABLE attributions ADD CONSTRAINT FK_14C967D2FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE attributions ADD CONSTRAINT FK_14C967D28AF49C8B FOREIGN KEY (horaires_id) REFERENCES horaires (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attributions DROP FOREIGN KEY FK_14C967D28AF49C8B');
        $this->addSql('ALTER TABLE attributions DROP FOREIGN KEY FK_14C967D2828317CA');
        $this->addSql('ALTER TABLE attributions DROP FOREIGN KEY FK_14C967D2FB88E14F');
        $this->addSql('DROP TABLE attributions');
        $this->addSql('DROP TABLE horaires');
        $this->addSql('DROP TABLE ordinateurs');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE utilisateurs');
    }
}
