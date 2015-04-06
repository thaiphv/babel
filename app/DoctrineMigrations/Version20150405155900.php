<?php

namespace Babel\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Sharding\SQLAzure\SQLAzureFederationsSynchronizer;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150405155900 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(<<<SQL
CREATE TABLE person (
    id INT AUTO_INCREMENT NOT NULL,
    first_name VARCHAR(32) DEFAULT NULL,
    last_name VARCHAR(32) DEFAULT NULL,
    email VARCHAR(32) DEFAULT NULL,
    mobile_number VARCHAR(32) NOT NULL,
    country_code VARCHAR(4) DEFAULT NULL,
    activation_code VARCHAR(32) NOT NULL,
    activation_code_expires_at DATETIME NOT NULL,
    created_time DATETIME NOT NULL,
    updated_time DATETIME NOT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
SQL
    );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
    }
}
