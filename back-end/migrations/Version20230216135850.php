<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230216135850 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE connection (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, connection_date DATETIME NOT NULL, INDEX IDX_29F7736679F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_member (id INT AUTO_INCREMENT NOT NULL, profil_id_id INT DEFAULT NULL, group_id_id INT DEFAULT NULL, joined_time DATETIME NOT NULL, left_time DATETIME DEFAULT NULL, INDEX IDX_A36222A831484513 (profil_id_id), INDEX IDX_A36222A82F68B530 (group_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, to_id INT NOT NULL, message_text VARCHAR(255) NOT NULL, sent_time DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_profil (message_id INT NOT NULL, profil_id INT NOT NULL, INDEX IDX_D1F12F98537A1329 (message_id), INDEX IDX_D1F12F98275ED078 (profil_id), PRIMARY KEY(message_id, profil_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_message_group (message_id INT NOT NULL, message_group_id INT NOT NULL, INDEX IDX_DBCBFD56537A1329 (message_id), INDEX IDX_DBCBFD56F7721D56 (message_group_id), PRIMARY KEY(message_id, message_group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_group (id INT AUTO_INCREMENT NOT NULL, group_name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, id_u_id INT NOT NULL, first_name VARCHAR(40) NOT NULL, last_name VARCHAR(40) NOT NULL, profil_photo VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_E6D6B2976F858F92 (id_u_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, u_mail VARCHAR(40) NOT NULL, u_password VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE connection ADD CONSTRAINT FK_29F7736679F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE group_member ADD CONSTRAINT FK_A36222A831484513 FOREIGN KEY (profil_id_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE group_member ADD CONSTRAINT FK_A36222A82F68B530 FOREIGN KEY (group_id_id) REFERENCES message_group (id)');
        $this->addSql('ALTER TABLE message_profil ADD CONSTRAINT FK_D1F12F98537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_profil ADD CONSTRAINT FK_D1F12F98275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_message_group ADD CONSTRAINT FK_DBCBFD56537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_message_group ADD CONSTRAINT FK_DBCBFD56F7721D56 FOREIGN KEY (message_group_id) REFERENCES message_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2976F858F92 FOREIGN KEY (id_u_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE connection DROP FOREIGN KEY FK_29F7736679F37AE5');
        $this->addSql('ALTER TABLE group_member DROP FOREIGN KEY FK_A36222A831484513');
        $this->addSql('ALTER TABLE group_member DROP FOREIGN KEY FK_A36222A82F68B530');
        $this->addSql('ALTER TABLE message_profil DROP FOREIGN KEY FK_D1F12F98537A1329');
        $this->addSql('ALTER TABLE message_profil DROP FOREIGN KEY FK_D1F12F98275ED078');
        $this->addSql('ALTER TABLE message_message_group DROP FOREIGN KEY FK_DBCBFD56537A1329');
        $this->addSql('ALTER TABLE message_message_group DROP FOREIGN KEY FK_DBCBFD56F7721D56');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B2976F858F92');
        $this->addSql('DROP TABLE connection');
        $this->addSql('DROP TABLE group_member');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE message_profil');
        $this->addSql('DROP TABLE message_message_group');
        $this->addSql('DROP TABLE message_group');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE `user`');
    }
}
