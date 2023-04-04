<?php

declare(strict_types=1);

namespace IctechShopwareAsCms\Core\Content\IctCms;

use phpDocumentor\Reflection\Types\Integer;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\CustomEntity\Xml\Field\BoolField;

class IctCmsDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'ictec_cms';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
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
        ));
    }
}
