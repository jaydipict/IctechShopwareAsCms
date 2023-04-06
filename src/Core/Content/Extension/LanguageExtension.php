<?php declare(strict_types=1);
namespace IctechShopwareAsCms\Core\Content\Extension;

use IctechShopwareAsCms\Core\Content\IctCms\Aggregate\IctCmsTranslation\IctCmsTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Language\LanguageDefinition;

class LanguageExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'ictCmsTransId',
                IctCmsTranslationDefinition::class,
                'ictec_cms_id'),
        );
    }
    public function getDefinitionClass(): string
    {
        return LanguageDefinition::class;
    }
}
