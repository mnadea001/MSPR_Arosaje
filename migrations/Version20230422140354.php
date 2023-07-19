<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230422140354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advice ADD botanist_id INT NOT NULL');
        $this->addSql('ALTER TABLE advice ADD CONSTRAINT FK_64820E8DC5802BC8 FOREIGN KEY (botanist_id) REFERENCES botanist (id)');
        $this->addSql('CREATE INDEX IDX_64820E8DC5802BC8 ON advice (botanist_id)');
        $this->addSql('ALTER TABLE plant_sitting ADD botanist_id INT NOT NULL');
        $this->addSql('ALTER TABLE plant_sitting ADD CONSTRAINT FK_923FB29AC5802BC8 FOREIGN KEY (botanist_id) REFERENCES botanist (id)');
        $this->addSql('CREATE INDEX IDX_923FB29AC5802BC8 ON plant_sitting (botanist_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advice DROP FOREIGN KEY FK_64820E8DC5802BC8');
        $this->addSql('DROP INDEX IDX_64820E8DC5802BC8 ON advice');
        $this->addSql('ALTER TABLE advice DROP botanist_id');
        $this->addSql('ALTER TABLE plant_sitting DROP FOREIGN KEY FK_923FB29AC5802BC8');
        $this->addSql('DROP INDEX IDX_923FB29AC5802BC8 ON plant_sitting');
        $this->addSql('ALTER TABLE plant_sitting DROP botanist_id');
    }
}
