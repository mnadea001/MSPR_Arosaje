<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230421205615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE advice (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE advice_plant (advice_id INT NOT NULL, plant_id INT NOT NULL, INDEX IDX_34AB45C512998205 (advice_id), INDEX IDX_34AB45C51D935652 (plant_id), PRIMARY KEY(advice_id, plant_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE advice_plant ADD CONSTRAINT FK_34AB45C512998205 FOREIGN KEY (advice_id) REFERENCES advice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advice_plant ADD CONSTRAINT FK_34AB45C51D935652 FOREIGN KEY (plant_id) REFERENCES plant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advice_plant DROP FOREIGN KEY FK_34AB45C512998205');
        $this->addSql('ALTER TABLE advice_plant DROP FOREIGN KEY FK_34AB45C51D935652');
        $this->addSql('DROP TABLE advice');
        $this->addSql('DROP TABLE advice_plant');
    }
}
