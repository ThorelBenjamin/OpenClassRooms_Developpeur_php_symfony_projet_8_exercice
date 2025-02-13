<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250213214319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture CHANGE prix_mensuel prix_mensuel DOUBLE PRECISION NOT NULL, CHANGE prix_journalier prix_journalier DOUBLE PRECISION NOT NULL, CHANGE boite_de_vitesse boite_de_vitesse TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture CHANGE prix_mensuel prix_mensuel INT NOT NULL, CHANGE prix_journalier prix_journalier INT NOT NULL, CHANGE boite_de_vitesse boite_de_vitesse VARCHAR(255) NOT NULL');
    }
}
