<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190914101319 extends AbstractMigration
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
        $this->addSql('ALTER TABLE user ADD home_country_id INT DEFAULT NULL, ADD current_country_id INT DEFAULT NULL, DROP home_country, DROP current_country, CHANGE birthdate birthdate DATE DEFAULT NULL, CHANGE gender gender VARCHAR(7) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64988E06F80 FOREIGN KEY (home_country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492694F702 FOREIGN KEY (current_country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64988E06F80 ON user (home_country_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492694F702 ON user (current_country_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE country CHANGE flagcode flagcode VARCHAR(2) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64988E06F80');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492694F702');
        $this->addSql('DROP INDEX IDX_8D93D64988E06F80 ON user');
        $this->addSql('DROP INDEX IDX_8D93D6492694F702 ON user');
        $this->addSql('ALTER TABLE user ADD home_country VARCHAR(25) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, ADD current_country VARCHAR(25) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, DROP home_country_id, DROP current_country_id, CHANGE birthdate birthdate DATE DEFAULT \'NULL\', CHANGE gender gender VARCHAR(7) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
