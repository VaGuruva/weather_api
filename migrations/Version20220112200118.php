<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220112200118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, resource VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prediction (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, predictions LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE predictions_weather_elements (prediction_id INT NOT NULL, weather_element_id INT NOT NULL, INDEX IDX_F5D5C0E0449DFD9E (prediction_id), INDEX IDX_F5D5C0E0A0E5C5B3 (weather_element_id), PRIMARY KEY(prediction_id, weather_element_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weather_element (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, measure_unit VARCHAR(255) DEFAULT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE predictions_weather_elements ADD CONSTRAINT FK_F5D5C0E0449DFD9E FOREIGN KEY (prediction_id) REFERENCES prediction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE predictions_weather_elements ADD CONSTRAINT FK_F5D5C0E0A0E5C5B3 FOREIGN KEY (weather_element_id) REFERENCES weather_element (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE predictions_weather_elements DROP FOREIGN KEY FK_F5D5C0E0449DFD9E');
        $this->addSql('ALTER TABLE predictions_weather_elements DROP FOREIGN KEY FK_F5D5C0E0A0E5C5B3');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE prediction');
        $this->addSql('DROP TABLE predictions_weather_elements');
        $this->addSql('DROP TABLE weather_element');
    }
}
