<?php

namespace App\Models\QuickbooksApi\Types;

class QuickbooksTypeVendorRef extends QuickbooksType {
    public const NAME = 'VendorRef';
    public const TYPE = 'Object';
    public const DESCRIPTION = 'Reference to the vendor for this transaction. Query the Vendor name list resource to determine the appropriate Vendor object for this reference. Use Vendor.Id and Vendor.Name from that object for VendorRef.value and VendorRef.name, respectively.';
    public const IS_FILTERABLE = true;
    public const IS_SORTABLE = true;

    public function getName(): string { return self::NAME; }
    public function getType(): string { return self::TYPE; }
    public function getDescription(): string { return self::DESCRIPTION; }
    public function getIsFilterable(): bool { return self::IS_FILTERABLE; }
    public function getIsSortable(): bool { return self::IS_SORTABLE; }
}
