<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210702140448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture MODIFY id_facture INT NOT NULL');
        $this->addSql('ALTER TABLE facture DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE facture CHANGE id_facture id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE user CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE numeropermisconduire numeropermisconduire INT NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE roles roles INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('ALTER TABLE vehicule DROP disponible, CHANGE type type VARCHAR(255) NOT NULL, CHANGE marque marque VARCHAR(255) NOT NULL, CHANGE modele modele VARCHAR(255) NOT NULL, CHANGE numeroserie numeroserie VARCHAR(255) NOT NULL, CHANGE couleur couleur VARCHAR(255) NOT NULL, CHANGE plaqueimmatriculation plaqueimmatriculation VARCHAR(255) NOT NULL, CHANGE dateachat dateachat VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE facture DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE facture CHANGE id id_facture INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD PRIMARY KEY (id_facture)');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE roles roles VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE password password VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE nom nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE prenom prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE numeropermisconduire numeropermisconduire VARCHAR(11) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE vehicule ADD disponible INT DEFAULT 1 NOT NULL, CHANGE type type VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE marque marque VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE modele modele VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE numeroserie numeroserie VARCHAR(15) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE couleur couleur VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE plaqueimmatriculation plaqueimmatriculation VARCHAR(9) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE dateachat dateachat DATE NOT NULL');
    }
}
