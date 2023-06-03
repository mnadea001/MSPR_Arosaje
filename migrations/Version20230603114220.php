<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230603114220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advice ADD CONSTRAINT FK_64820E8D1D935652 FOREIGN KEY (plant_id) REFERENCES plant (id)');
        $this->addSql('ALTER TABLE advice ADD CONSTRAINT FK_64820E8D7797FCF FOREIGN KEY (botaniste_id) REFERENCES botaniste (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8D1D935652');
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8D7797FCF');
    }
}
