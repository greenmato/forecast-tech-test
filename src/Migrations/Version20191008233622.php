<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191008233622 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE forecast (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, location_key VARCHAR(6) NOT NULL, min_temp_celcius DOUBLE PRECISION NOT NULL, max_temp_celcius DOUBLE PRECISION NOT NULL, day_has_precipitation TINYINT(1) NOT NULL, day_precipitation_type VARCHAR(50) DEFAULT NULL, day_precipitation_intensity VARCHAR(50) DEFAULT NULL, night_has_precipitation TINYINT(1) NOT NULL, night_precipitation_type VARCHAR(50) DEFAULT NULL, night_precipitation_intensity VARCHAR(50) DEFAULT NULL, mobile_link VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE forecast');
    }
}
