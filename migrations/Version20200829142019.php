<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200829142019 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(3) NOT NULL, name VARCHAR(200) NOT NULL, flagcode VARCHAR(2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, iso_code VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language_user (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, language_id INT NOT NULL, level INT NOT NULL, INDEX IDX_BF9A3C05A76ED395 (user_id), INDEX IDX_BF9A3C0582F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, home_country_id INT DEFAULT NULL, current_country_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, displayname VARCHAR(25) NOT NULL, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, birthdate DATE DEFAULT NULL, gender VARCHAR(7) DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, education VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, about LONGTEXT DEFAULT NULL, hobbies LONGTEXT DEFAULT NULL, music LONGTEXT DEFAULT NULL, movies LONGTEXT DEFAULT NULL, tv_shows LONGTEXT DEFAULT NULL, books LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649C71DCCA6 (displayname), INDEX IDX_8D93D64988E06F80 (home_country_id), INDEX IDX_8D93D6492694F702 (current_country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE language_user ADD CONSTRAINT FK_BF9A3C05A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE language_user ADD CONSTRAINT FK_BF9A3C0582F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64988E06F80 FOREIGN KEY (home_country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492694F702 FOREIGN KEY (current_country_id) REFERENCES country (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64988E06F80');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492694F702');
        $this->addSql('ALTER TABLE language_user DROP FOREIGN KEY FK_BF9A3C0582F1BAF4');
        $this->addSql('ALTER TABLE language_user DROP FOREIGN KEY FK_BF9A3C05A76ED395');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE language_user');
        $this->addSql('DROP TABLE user');
    }
}
