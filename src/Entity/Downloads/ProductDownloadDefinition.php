<?php declare(strict_types=1);
namespace MastoxExtendedDocuments\Entity\Downloads;


use Shopware\Core\Content\Media\MediaDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\DateField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IntField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;


class ProductDownloadDefinition extends EntityDefinition {

    public const ENTITY_NAME = 'product_downloads';

    public function getEntityName(): string {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string {
        return ProductDownloadCollection::class;
    }

    public function getEntityClass(): string {
        return ProductDownloadEntity::class;
    }

    protected function defineFields(): FieldCollection {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            (new IntField('counter', 'counter'))->addFlags(new Required()),

            (new FkField('product_id', 'productId', ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            new ManyToOneAssociationField('product', 'product_id', ProductDefinition::class, 'id', false),

            (new FkField('media_id', 'mediaId', MediaDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            new ManyToOneAssociationField('media', 'media_id', MediaDefinition::class, 'id', false),
            new CreatedAtField()
        ]);
    }
}
