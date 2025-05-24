<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250524211052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE employee ADD restaurant_id INT NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD active TINYINT(1) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', ADD updated_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5D9F75A1B1E7706E ON employee (restaurant_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE restaurant ADD created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', ADD updated_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)'
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1B1E7706E
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_5D9F75A1B1E7706E ON employee
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE employee DROP restaurant_id, DROP email, DROP active, DROP created_at, DROP updated_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE restaurant DROP created_at, DROP updated_at
        SQL);
    }
}
