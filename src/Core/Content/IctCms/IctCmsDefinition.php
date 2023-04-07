<?php

declare(strict_types=1);

namespace IctechShopwareAsCms\Core\Content\IctCms;

use IctechShopwareAsCms\Core\Content\IctCms\Aggregate\IctCmsTranslation\IctCmsTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class IctCmsDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'ict_cms';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return IctCmsEntity::class;
    }

    public function getCollectionClass(): string
    {
        return IctCmsCollection::class;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection(array(

            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            (new TranslatedField('name')),
            (new StringField('email', 'email'))->addFlags(new Required()),
            (new StringField('contact', 'contact_number'))->addFlags(new Required()),
            (new TranslatedField('subject')),
            (new TranslatedField('description')),
            (new BoolField('active', 'active')),
            (new TranslationsAssociationField(IctCmsTranslationDefinition::class, 'ict_cms_id'))->addFlags(new ApiAware(), new Required()),
        ));
    }
}
