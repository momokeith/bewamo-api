<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170606130347 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE shops (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_shops (userId INT NOT NULL, shopId INT NOT NULL, INDEX IDX_C40DC3CA64B64DCC (userId), INDEX IDX_C40DC3CAC9E63C48 (shopId), PRIMARY KEY(userId, shopId)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_shops ADD CONSTRAINT FK_C40DC3CA64B64DCC FOREIGN KEY (userId) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_shops ADD CONSTRAINT FK_C40DC3CAC9E63C48 FOREIGN KEY (shopId) REFERENCES shops (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users_shops DROP FOREIGN KEY FK_C40DC3CAC9E63C48');
        $this->addSql('ALTER TABLE users_shops DROP FOREIGN KEY FK_C40DC3CA64B64DCC');
        $this->addSql('DROP TABLE shops');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_shops');
    }
}
