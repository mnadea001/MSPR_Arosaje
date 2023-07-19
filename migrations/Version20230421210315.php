<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230421210315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, recipient_id INT NOT NULL, object VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B6BD307FF624B39D (sender_id), INDEX IDX_B6BD307FE92F8F78 (recipient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant_sitting (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_923FB29AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant_sitting_plant (plant_sitting_id INT NOT NULL, plant_id INT NOT NULL, INDEX IDX_A11E0BD6F6501983 (plant_sitting_id), INDEX IDX_A11E0BD61D935652 (plant_id), PRIMARY KEY(plant_sitting_id, plant_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FE92F8F78 FOREIGN KEY (recipient_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE plant_sitting_plant ADD CONSTRAINT FK_A11E0BD6F6501983 FOREIGN KEY (plant_sitting_id) REFERENCES plant_sitting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plant_sitting_plant ADD CONSTRAINT FK_A11E0BD61D935652 FOREIGN KEY (plant_id) REFERENCES plant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FE92F8F78');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29AA76ED395');
        $this->addSql('ALTER TABLE plant_sitting_plant DROP FOREIGN KEY FK_A11E0BD6F6501983');
        $this->addSql('ALTER TABLE plant_sitting_plant DROP FOREIGN KEY FK_A11E0BD61D935652');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE plant_sitting');
        $this->addSql('DROP TABLE plant_sitting_plant');
    }
}
