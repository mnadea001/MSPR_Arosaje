<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230603114420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE advice (id INT AUTO_INCREMENT NOT NULL, plant_id INT NOT NULL, botaniste_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_64820E8D1D935652 (plant_id), INDEX IDX_64820E8D7797FCF (botaniste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE botaniste (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chat (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, botaniste_id INT NOT NULL, INDEX IDX_659DF2AAA76ED395 (user_id), INDEX IDX_659DF2AA7797FCF (botaniste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, chat_id INT NOT NULL, sender_id INT NOT NULL, object VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B6BD307F1A9A7125 (chat_id), INDEX IDX_B6BD307FF624B39D (sender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant (id INT AUTO_INCREMENT NOT NULL, visitor_id INT DEFAULT NULL, plant_type_id INT NOT NULL, image_file VARCHAR(255) DEFAULT NULL, add_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', description VARCHAR(255) NOT NULL, INDEX IDX_AB030D7270BEE6D (visitor_id), INDEX IDX_AB030D72BFC546EA (plant_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant_sitting (id INT AUTO_INCREMENT NOT NULL, visitor_id INT DEFAULT NULL, botaniste_id INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_923FB29A70BEE6D (visitor_id), INDEX IDX_923FB29A7797FCF (botaniste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant_sitting_plant (plant_sitting_id INT NOT NULL, plant_id INT NOT NULL, INDEX IDX_A11E0BD6F6501983 (plant_sitting_id), INDEX IDX_A11E0BD61D935652 (plant_id), PRIMARY KEY(plant_sitting_id, plant_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant_type (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visitor (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE advice ADD CONSTRAINT FK_64820E8D1D935652 FOREIGN KEY (plant_id) REFERENCES plant (id)');
        $this->addSql('ALTER TABLE advice ADD CONSTRAINT FK_64820E8D7797FCF FOREIGN KEY (botaniste_id) REFERENCES botaniste (id)');
        $this->addSql('ALTER TABLE botaniste ADD CONSTRAINT FK_6C8A9D5BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AA7797FCF FOREIGN KEY (botaniste_id) REFERENCES botaniste (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F1A9A7125 FOREIGN KEY (chat_id) REFERENCES chat (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D7270BEE6D FOREIGN KEY (visitor_id) REFERENCES visitor (id)');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72BFC546EA FOREIGN KEY (plant_type_id) REFERENCES plant_type (id)');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29A70BEE6D FOREIGN KEY (visitor_id) REFERENCES visitor (id)');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29A7797FCF FOREIGN KEY (botaniste_id) REFERENCES botaniste (id)');
        $this->addSql('ALTER TABLE plant_sitting_plant ADD CONSTRAINT FK_A11E0BD6F6501983 FOREIGN KEY (plant_sitting_id) REFERENCES plant_sitting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plant_sitting_plant ADD CONSTRAINT FK_A11E0BD61D935652 FOREIGN KEY (plant_id) REFERENCES plant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE visitor ADD CONSTRAINT FK_CAE5E19FBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8D1D935652');
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8D7797FCF');
        $this->addSql('ALTER TABLE botaniste DROP FOREIGN KEY FK_6C8A9D5BF396750');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AAA76ED395');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AA7797FCF');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F1A9A7125');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D7270BEE6D');
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D72BFC546EA');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29A70BEE6D');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29A7797FCF');
        $this->addSql('ALTER TABLE plant_sitting_plant DROP FOREIGN KEY FK_A11E0BD6F6501983');
        $this->addSql('ALTER TABLE plant_sitting_plant DROP FOREIGN KEY FK_A11E0BD61D935652');
        $this->addSql('ALTER TABLE visitor DROP FOREIGN KEY FK_CAE5E19FBF396750');
        $this->addSql('DROP TABLE advice');
        $this->addSql('DROP TABLE botaniste');
        $this->addSql('DROP TABLE chat');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE plant');
        $this->addSql('DROP TABLE plant_sitting');
        $this->addSql('DROP TABLE plant_sitting_plant');
        $this->addSql('DROP TABLE plant_type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE visitor');
    }
}
