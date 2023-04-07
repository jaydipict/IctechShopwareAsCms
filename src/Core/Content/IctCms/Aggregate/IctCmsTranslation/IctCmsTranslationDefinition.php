<?php declare(strict_types=1);

namespace IctechShopwareAsCms\Core\Content\IctCms\Aggregate\IctCmsTranslation;

use IctechShopwareAsCms\Core\Content\IctCms\IctCmsDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;


class IctCmsTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME = 'ict_cms_translation';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return IctCmsTranslationCollection::class;
    }

    public function getEntityClass(): string
    {
        return IctCmsTranslationEntity::class;
    }

    protected function getParentDefinitionClass(): string
    {
        return IctCmsDefinition::class;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('name', 'name'))->addFlags(new Required()),
            (new StringField('subject', 'subject'))->addFlags(new Required()),
            (new StringField('description', 'description'))->addFlags(new Required()),
        ]);
    }


}
