<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230216142712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_message_group DROP FOREIGN KEY FK_DBCBFD56537A1329');
        $this->addSql('ALTER TABLE message_message_group DROP FOREIGN KEY FK_DBCBFD56F7721D56');
        $this->addSql('ALTER TABLE message_profil DROP FOREIGN KEY FK_D1F12F98537A1329');
        $this->addSql('ALTER TABLE message_profil DROP FOREIGN KEY FK_D1F12F98275ED078');
        $this->addSql('DROP TABLE message_message_group');
        $this->addSql('DROP TABLE message_profil');
        $this->addSql('ALTER TABLE message ADD profil_id_id INT DEFAULT NULL, ADD group_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F31484513 FOREIGN KEY (profil_id_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F2F68B530 FOREIGN KEY (group_id_id) REFERENCES message_group (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F31484513 ON message (profil_id_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F2F68B530 ON message (group_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE message_message_group (message_id INT NOT NULL, message_group_id INT NOT NULL, INDEX IDX_DBCBFD56537A1329 (message_id), INDEX IDX_DBCBFD56F7721D56 (message_group_id), PRIMARY KEY(message_id, message_group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE message_profil (message_id INT NOT NULL, profil_id INT NOT NULL, INDEX IDX_D1F12F98537A1329 (message_id), INDEX IDX_D1F12F98275ED078 (profil_id), PRIMARY KEY(message_id, profil_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE message_message_group ADD CONSTRAINT FK_DBCBFD56537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_message_group ADD CONSTRAINT FK_DBCBFD56F7721D56 FOREIGN KEY (message_group_id) REFERENCES message_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_profil ADD CONSTRAINT FK_D1F12F98537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_profil ADD CONSTRAINT FK_D1F12F98275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F31484513');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F2F68B530');
        $this->addSql('DROP INDEX IDX_B6BD307F31484513 ON message');
        $this->addSql('DROP INDEX IDX_B6BD307F2F68B530 ON message');
        $this->addSql('ALTER TABLE message DROP profil_id_id, DROP group_id_id');
    }
}
