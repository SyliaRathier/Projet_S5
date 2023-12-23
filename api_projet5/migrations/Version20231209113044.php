<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231209113044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, utilisation VARCHAR(255) NOT NULL, caracteristique VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette_materiel (recette_id INT NOT NULL, materiel_id INT NOT NULL, INDEX IDX_A8C6506989312FE9 (recette_id), INDEX IDX_A8C6506916880AAF (materiel_id), PRIMARY KEY(recette_id, materiel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recette_materiel ADD CONSTRAINT FK_A8C6506989312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recette_materiel ADD CONSTRAINT FK_A8C6506916880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette_materiel DROP FOREIGN KEY FK_A8C6506989312FE9');
        $this->addSql('ALTER TABLE recette_materiel DROP FOREIGN KEY FK_A8C6506916880AAF');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE recette_materiel');
    }
}
