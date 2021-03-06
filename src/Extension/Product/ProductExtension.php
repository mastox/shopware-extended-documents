<?php declare(strict_types=1);


namespace MastoxProductAttachments\Extension\Product;

use MastoxProductAttachments\Entity\Attachments\ProductAttachmentsDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductExtension extends EntityExtension {

    public function extendFields(FieldCollection $collection): void {
        $collection->add(
            (new OneToManyAssociationField('attachments', ProductAttachmentsDefinition::class, 'product_id', 'id'))
        );
    }

    public function getDefinitionClass(): string {
        return ProductDefinition::class;
    }
}
