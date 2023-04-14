<?php declare(strict_types=1);

namespace IctechShopwareAsCms\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1680847722ict_cms extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1680847722;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement("
        CREATE TABLE IF NOT EXISTS `ict_cms` (
    `id` BINARY(16) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `contact` VARCHAR(255) NOT NULL,
    `active` TINYINT(1) NULL DEFAULT '0',
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

        $connection->executeStatement('
        CREATE TABLE IF NOT EXISTS `ict_cms_translation` (
    `name` VARCHAR(255) NOT NULL,
    `subject` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `ict_cms_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`ict_cms_id`,`language_id`),
    KEY `fk.ict_cms_translation.ict_cms_id` (`ict_cms_id`),
    KEY `fk.ict_cms_translation.language_id` (`language_id`),
    CONSTRAINT `fk.ict_cms_translation.ict_cms_id` FOREIGN KEY (`ict_cms_id`) REFERENCES `ict_cms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk.ict_cms_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
