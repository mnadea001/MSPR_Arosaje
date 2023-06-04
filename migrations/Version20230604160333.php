<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230604160333 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE advice_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE botanist_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE message_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE plant_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE plant_sitting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE advice (id INT NOT NULL, botanist_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_64820E8DC5802BC8 ON advice (botanist_id)');
        $this->addSql('COMMENT ON COLUMN advice.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE advice_plant (advice_id INT NOT NULL, plant_id INT NOT NULL, PRIMARY KEY(advice_id, plant_id))');
        $this->addSql('CREATE INDEX IDX_34AB45C512998205 ON advice_plant (advice_id)');
        $this->addSql('CREATE INDEX IDX_34AB45C51D935652 ON advice_plant (plant_id)');
        $this->addSql('CREATE TABLE botanist (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7176BA06E7927C74 ON botanist (email)');
        $this->addSql('COMMENT ON COLUMN botanist.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE message (id INT NOT NULL, sender_id INT NOT NULL, recipient_id INT NOT NULL, object VARCHAR(255) NOT NULL, content TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B6BD307FF624B39D ON message (sender_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FE92F8F78 ON message (recipient_id)');
        $this->addSql('COMMENT ON COLUMN message.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE plant (id INT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, image_file VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AB030D72A76ED395 ON plant (user_id)');
        $this->addSql('COMMENT ON COLUMN plant.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE plant_sitting (id INT NOT NULL, user_id INT NOT NULL, botanist_id INT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_923FB29AA76ED395 ON plant_sitting (user_id)');
        $this->addSql('CREATE INDEX IDX_923FB29AC5802BC8 ON plant_sitting (botanist_id)');
        $this->addSql('COMMENT ON COLUMN plant_sitting.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE plant_sitting_plant (plant_sitting_id INT NOT NULL, plant_id INT NOT NULL, PRIMARY KEY(plant_sitting_id, plant_id))');
        $this->addSql('CREATE INDEX IDX_A11E0BD6F6501983 ON plant_sitting_plant (plant_sitting_id)');
        $this->addSql('CREATE INDEX IDX_A11E0BD61D935652 ON plant_sitting_plant (plant_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE advice ADD CONSTRAINT FK_64820E8DC5802BC8 FOREIGN KEY (botanist_id) REFERENCES botanist (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE advice_plant ADD CONSTRAINT FK_34AB45C512998205 FOREIGN KEY (advice_id) REFERENCES advice (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE advice_plant ADD CONSTRAINT FK_34AB45C51D935652 FOREIGN KEY (plant_id) REFERENCES plant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FE92F8F78 FOREIGN KEY (recipient_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29AA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29AC5802BC8 FOREIGN KEY (botanist_id) REFERENCES botanist (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plant_sitting_plant ADD CONSTRAINT FK_A11E0BD6F6501983 FOREIGN KEY (plant_sitting_id) REFERENCES plant_sitting (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plant_sitting_plant ADD CONSTRAINT FK_A11E0BD61D935652 FOREIGN KEY (plant_id) REFERENCES plant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE advice_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE botanist_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE message_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE plant_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE plant_sitting_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('ALTER TABLE advice DROP CONSTRAINT FK_64820E8DC5802BC8');
        $this->addSql('ALTER TABLE advice_plant DROP CONSTRAINT FK_34AB45C512998205');
        $this->addSql('ALTER TABLE advice_plant DROP CONSTRAINT FK_34AB45C51D935652');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307FE92F8F78');
        $this->addSql('ALTER TABLE plant DROP CONSTRAINT FK_AB030D72A76ED395');
        $this->addSql('ALTER TABLE plant_sitting DROP CONSTRAINT FK_923FB29AA76ED395');
        $this->addSql('ALTER TABLE plant_sitting DROP CONSTRAINT FK_923FB29AC5802BC8');
        $this->addSql('ALTER TABLE plant_sitting_plant DROP CONSTRAINT FK_A11E0BD6F6501983');
        $this->addSql('ALTER TABLE plant_sitting_plant DROP CONSTRAINT FK_A11E0BD61D935652');
        $this->addSql('DROP TABLE advice');
        $this->addSql('DROP TABLE advice_plant');
        $this->addSql('DROP TABLE botanist');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE plant');
        $this->addSql('DROP TABLE plant_sitting');
        $this->addSql('DROP TABLE plant_sitting_plant');
        $this->addSql('DROP TABLE "user"');
    }
}
