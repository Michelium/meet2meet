<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190914153643 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE country CHANGE flagcode flagcode VARCHAR(2) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD avatar VARCHAR(255) DEFAULT NULL, ADD education VARCHAR(255) DEFAULT NULL, ADD status VARCHAR(255) DEFAULT NULL, ADD about LONGTEXT DEFAULT NULL, ADD hobbies LONGTEXT DEFAULT NULL, ADD music LONGTEXT DEFAULT NULL, ADD movies LONGTEXT DEFAULT NULL, ADD tv_shows LONGTEXT DEFAULT NULL, ADD books LONGTEXT DEFAULT NULL, CHANGE home_country_id home_country_id INT DEFAULT NULL, CHANGE current_country_id current_country_id INT DEFAULT NULL, CHANGE birthdate birthdate DATE DEFAULT NULL, CHANGE gender gender VARCHAR(7) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE country CHANGE flagcode flagcode VARCHAR(2) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user DROP avatar, DROP education, DROP status, DROP about, DROP hobbies, DROP music, DROP movies, DROP tv_shows, DROP books, CHANGE home_country_id home_country_id INT DEFAULT NULL, CHANGE current_country_id current_country_id INT DEFAULT NULL, CHANGE birthdate birthdate DATE DEFAULT \'NULL\', CHANGE gender gender VARCHAR(7) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
