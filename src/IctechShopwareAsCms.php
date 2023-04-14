<?php declare(strict_types=1);

namespace IctechShopwareAsCms;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

class IctechShopwareAsCms extends Plugin
{
//    added uninstall plugin events
    public function uninstall(UninstallContext $context): void
    {
        parent::uninstall($context);

        if ($context->keepUserData()) {
            return;
        }

        $connection = $this->container->get(Connection::class);
        $connection->executeStatement('DROP TABLE IF EXISTS `ict_cms_translation`');
        $connection->executeStatement('DROP TABLE IF EXISTS `ict_cms`');
    }
}
