<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230603015116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_6C8A9D5E7927C74 ON botaniste');
        $this->addSql('ALTER TABLE botaniste DROP email, DROP roles, DROP password, DROP username, DROP adress, DROP city, DROP country, DROP created_at, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE botaniste ADD CONSTRAINT FK_6C8A9D5BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD discr VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_CAE5E19FE7927C74 ON visitor');
        $this->addSql('ALTER TABLE visitor DROP email, DROP roles, DROP password, DROP username, DROP adress, DROP city, DROP country, DROP created_at, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE visitor ADD CONSTRAINT FK_CAE5E19FBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE botaniste DROP FOREIGN KEY FK_6C8A9D5BF396750');
        $this->addSql('ALTER TABLE botaniste ADD email VARCHAR(180) NOT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', ADD password VARCHAR(255) NOT NULL, ADD username VARCHAR(255) NOT NULL, ADD adress VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C8A9D5E7927C74 ON botaniste (email)');
        $this->addSql('ALTER TABLE user DROP discr');
        $this->addSql('ALTER TABLE visitor DROP FOREIGN KEY FK_CAE5E19FBF396750');
        $this->addSql('ALTER TABLE visitor ADD email VARCHAR(180) NOT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', ADD password VARCHAR(255) NOT NULL, ADD username VARCHAR(255) NOT NULL, ADD adress VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CAE5E19FE7927C74 ON visitor (email)');
    }
}
