<?php

namespace App\Models\QuickbooksApi\Types;

class QuickbooksTypeId extends QuickbooksType {
    public const NAME = 'Id';
    public const TYPE = 'String';
    public const DESCRIPTION = 'Unique identifier for this object. Sort order is ASC by default.';
    public const IS_FILTERABLE = true;
    public const IS_SORTABLE = true;

    public function getName(): string { return self::NAME; }
    public function getType(): string { return self::TYPE; }
    public function getDescription(): string { return self::DESCRIPTION; }
    public function getIsFilterable(): bool { return self::IS_FILTERABLE; }
    public function getIsSortable(): bool { return self::IS_SORTABLE; }
}
