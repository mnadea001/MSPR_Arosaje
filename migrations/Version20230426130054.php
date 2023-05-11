<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426130054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8DC5802BC8');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29AC5802BC8');
        $this->addSql('CREATE TABLE botaniste (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_6C8A9D5E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chat (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, botaniste_id INT NOT NULL, INDEX IDX_659DF2AAA76ED395 (user_id), INDEX IDX_659DF2AA7797FCF (botaniste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visitor (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_CAE5E19FE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AA7797FCF FOREIGN KEY (botaniste_id) REFERENCES botaniste (id)');
        $this->addSql('ALTER TABLE advice_plant DROP FOREIGN KEY FK_34AB45C512998205');
        $this->addSql('ALTER TABLE advice_plant DROP FOREIGN KEY FK_34AB45C51D935652');
        $this->addSql('DROP TABLE advice_plant');
        $this->addSql('DROP TABLE botanist');
        $this->addSql('DROP INDEX IDX_64820E8DC5802BC8 ON advice');
        $this->addSql('ALTER TABLE advice ADD botaniste_id INT NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE botanist_id plant_id INT NOT NULL');
        $this->addSql('ALTER TABLE advice ADD CONSTRAINT FK_64820E8D1D935652 FOREIGN KEY (plant_id) REFERENCES plant (id)');
        $this->addSql('ALTER TABLE advice ADD CONSTRAINT FK_64820E8D7797FCF FOREIGN KEY (botaniste_id) REFERENCES botaniste (id)');
        $this->addSql('CREATE INDEX IDX_64820E8D1D935652 ON advice (plant_id)');
        $this->addSql('CREATE INDEX IDX_64820E8D7797FCF ON advice (botaniste_id)');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FE92F8F78');
        $this->addSql('DROP INDEX IDX_B6BD307FE92F8F78 ON message');
        $this->addSql('ALTER TABLE message CHANGE content content VARCHAR(255) NOT NULL, CHANGE recipient_id chat_id INT NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F1A9A7125 FOREIGN KEY (chat_id) REFERENCES chat (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F1A9A7125 ON message (chat_id)');
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D72A76ED395');
        $this->addSql('DROP INDEX IDX_AB030D72A76ED395 ON plant');
        $this->addSql('ALTER TABLE plant ADD visitor_id INT DEFAULT NULL, DROP user_id, CHANGE created_at add_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D7270BEE6D FOREIGN KEY (visitor_id) REFERENCES visitor (id)');
        $this->addSql('CREATE INDEX IDX_AB030D7270BEE6D ON plant (visitor_id)');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29AA76ED395');
        $this->addSql('DROP INDEX IDX_923FB29AC5802BC8 ON plant_sitting');
        $this->addSql('DROP INDEX IDX_923FB29AA76ED395 ON plant_sitting');
        $this->addSql('ALTER TABLE plant_sitting ADD visitor_id INT DEFAULT NULL, ADD botaniste_id INT NOT NULL, DROP user_id, DROP botanist_id, CHANGE start_date start_date DATETIME NOT NULL, CHANGE end_date end_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29A70BEE6D FOREIGN KEY (visitor_id) REFERENCES visitor (id)');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29A7797FCF FOREIGN KEY (botaniste_id) REFERENCES botaniste (id)');
        $this->addSql('CREATE INDEX IDX_923FB29A70BEE6D ON plant_sitting (visitor_id)');
        $this->addSql('CREATE INDEX IDX_923FB29A7797FCF ON plant_sitting (botaniste_id)');
        $this->addSql('ALTER TABLE user ADD adress VARCHAR(255) NOT NULL, DROP address, CHANGE city city VARCHAR(255) NOT NULL, CHANGE country country VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8D7797FCF');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29A7797FCF');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F1A9A7125');
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D7270BEE6D');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29A70BEE6D');
        $this->addSql('CREATE TABLE advice_plant (advice_id INT NOT NULL, plant_id INT NOT NULL, INDEX IDX_34AB45C512998205 (advice_id), INDEX IDX_34AB45C51D935652 (plant_id), PRIMARY KEY(advice_id, plant_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE botanist (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, address VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, city VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, country VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', email VARCHAR(180) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, roles LONGTEXT CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci` COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, UNIQUE INDEX UNIQ_7176BA06E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE advice_plant ADD CONSTRAINT FK_34AB45C512998205 FOREIGN KEY (advice_id) REFERENCES advice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advice_plant ADD CONSTRAINT FK_34AB45C51D935652 FOREIGN KEY (plant_id) REFERENCES plant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AAA76ED395');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AA7797FCF');
        $this->addSql('DROP TABLE botaniste');
        $this->addSql('DROP TABLE chat');
        $this->addSql('DROP TABLE visitor');
        $this->addSql('ALTER TABLE user ADD address VARCHAR(255) DEFAULT NULL, DROP adress, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX IDX_AB030D7270BEE6D ON plant');
        $this->addSql('ALTER TABLE plant ADD user_id INT NOT NULL, DROP visitor_id, CHANGE add_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AB030D72A76ED395 ON plant (user_id)');
        $this->addSql('DROP INDEX IDX_B6BD307F1A9A7125 ON message');
        $this->addSql('ALTER TABLE message CHANGE content content LONGTEXT NOT NULL, CHANGE chat_id recipient_id INT NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FE92F8F78 FOREIGN KEY (recipient_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FE92F8F78 ON message (recipient_id)');
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8D1D935652');
        $this->addSql('DROP INDEX IDX_64820E8D1D935652 ON advice');
        $this->addSql('DROP INDEX IDX_64820E8D7797FCF ON advice');
        $this->addSql('ALTER TABLE advice ADD botanist_id INT NOT NULL, DROP plant_id, DROP botaniste_id, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE advice ADD CONSTRAINT FK_64820E8DC5802BC8 FOREIGN KEY (botanist_id) REFERENCES botanist (id)');
        $this->addSql('CREATE INDEX IDX_64820E8DC5802BC8 ON advice (botanist_id)');
        $this->addSql('DROP INDEX IDX_923FB29A70BEE6D ON plant_sitting');
        $this->addSql('DROP INDEX IDX_923FB29A7797FCF ON plant_sitting');
        $this->addSql('ALTER TABLE plant_sitting ADD botanist_id INT NOT NULL, DROP visitor_id, CHANGE start_date start_date DATE NOT NULL, CHANGE end_date end_date DATE NOT NULL, CHANGE botaniste_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29AC5802BC8 FOREIGN KEY (botanist_id) REFERENCES botanist (id)');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_923FB29AC5802BC8 ON plant_sitting (botanist_id)');
        $this->addSql('CREATE INDEX IDX_923FB29AA76ED395 ON plant_sitting (user_id)');
    }
}
