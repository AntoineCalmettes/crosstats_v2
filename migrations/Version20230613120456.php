<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230613120456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE box (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE box_user (box_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7BF79A40D8177B3F (box_id), INDEX IDX_7BF79A40A76ED395 (user_id), PRIMARY KEY(box_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE box_user ADD CONSTRAINT FK_7BF79A40D8177B3F FOREIGN KEY (box_id) REFERENCES box (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE box_user ADD CONSTRAINT FK_7BF79A40A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD favorite_box_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E4A217C5 FOREIGN KEY (favorite_box_id) REFERENCES box (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649E4A217C5 ON user (favorite_box_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649E4A217C5');
        $this->addSql('ALTER TABLE box_user DROP FOREIGN KEY FK_7BF79A40D8177B3F');
        $this->addSql('ALTER TABLE box_user DROP FOREIGN KEY FK_7BF79A40A76ED395');
        $this->addSql('DROP TABLE box');
        $this->addSql('DROP TABLE box_user');
        $this->addSql('DROP INDEX IDX_8D93D649E4A217C5 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP favorite_box_id');
    }
}
