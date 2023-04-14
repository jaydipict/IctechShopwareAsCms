<?php declare(strict_types=1);

namespace IctechShopwareAsCms\Core\Content\IctCms\Aggregate\IctCmsTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                 add(IctCmsTranslationEntity $entity)
 * @method void                 set(string $key, IctCmsTranslationEntity $entity)
 * @method IctCmsTranslationEntity[]    getIterator()
 * @method IctCmsTranslationEntity[]    getElements()
 * @method IctCmsTranslationEntity|null get(string $key)
 * @method IctCmsTranslationEntity|null first()
 * @method IctCmsTranslationEntity|null last()
 */
#[Package('core')]
class IctCmsTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return IctCmsTranslationEntity::class;
    }
}
