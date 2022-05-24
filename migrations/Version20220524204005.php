<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220524204005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, birth DATETIME NOT NULL, UNIQUE INDEX UNIQ_69E399D6E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, ville_id_id INT NOT NULL, proprietaire_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, street_number VARCHAR(255) NOT NULL, street_name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_EB95123FF0C17188 (ville_id_id), INDEX IDX_EB95123F6EC1D6E1 (proprietaire_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, zipcode VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FF0C17188 FOREIGN KEY (ville_id_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F6EC1D6E1 FOREIGN KEY (proprietaire_id_id) REFERENCES proprietaire (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F6EC1D6E1');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FF0C17188');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE ville');
    }
}
