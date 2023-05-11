<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511174237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8D7797FCF');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AA7797FCF');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29A7797FCF');
        $this->addSql('CREATE TABLE botaniste (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_6C8A9D5E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE botanist');
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8D7797FCF');
        $this->addSql('ALTER TABLE advice ADD CONSTRAINT FK_64820E8D7797FCF FOREIGN KEY (botaniste_id) REFERENCES botaniste (id)');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AA7797FCF');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AA7797FCF FOREIGN KEY (botaniste_id) REFERENCES botaniste (id)');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29A7797FCF');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29A7797FCF FOREIGN KEY (botaniste_id) REFERENCES botaniste (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8D7797FCF');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AA7797FCF');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29A7797FCF');
        $this->addSql('CREATE TABLE botanist (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, roles LONGTEXT CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci` COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, username VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, adress VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, city VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, country VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_6C8A9D5E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE botaniste');
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8D7797FCF');
        $this->addSql('ALTER TABLE advice ADD CONSTRAINT FK_64820E8D7797FCF FOREIGN KEY (botaniste_id) REFERENCES botanist (id)');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AA7797FCF');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AA7797FCF FOREIGN KEY (botaniste_id) REFERENCES botanist (id)');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29A7797FCF');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29A7797FCF FOREIGN KEY (botaniste_id) REFERENCES botanist (id)');
    }
}
