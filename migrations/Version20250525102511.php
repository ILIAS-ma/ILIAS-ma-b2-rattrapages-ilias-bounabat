<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250525102511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1B1E7706E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1B1E7706E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
    }
}
