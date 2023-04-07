<?php declare(strict_types=1);

namespace IctechShopwareAsCms\Core\Content\IctCms;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;


/**
 * @method void                add(IctCmsEntity $entity)
 * @method void                set(string $key, IctCmsEntity $entity)
 * @method IctCmsEntity[]    getIterator()
 * @method IctCmsEntity[]    getElements()
 * @method IctCmsEntity|null get(string $key)
 * @method IctCmsEntity|null first()
 * @method IctCmsEntity|null last()
 */
 #[Package('core')]
class IctCmsCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return IctCmsEntity::class;
    }
}
