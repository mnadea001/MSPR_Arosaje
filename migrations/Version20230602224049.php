<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230602224049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant ADD plant_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72BFC546EA FOREIGN KEY (plant_type_id) REFERENCES plant_type (id)');
        $this->addSql('CREATE INDEX IDX_AB030D72BFC546EA ON plant (plant_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D72BFC546EA');
        $this->addSql('DROP INDEX IDX_AB030D72BFC546EA ON plant');
        $this->addSql('ALTER TABLE plant DROP plant_type_id');
    }
}
