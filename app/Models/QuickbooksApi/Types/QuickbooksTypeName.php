<?php

namespace App\Models\QuickbooksApi\Types;

class QuickbooksTypeName extends QuickbooksType {
    public const NAME = 'Name';
    public const TYPE = 'String';
    public const DESCRIPTION = 'User recognizable name for the Account. `Account.Name` attribute must not contain double quotes (") or colon (:).';
    public const IS_FILTERABLE = true;
    public const IS_SORTABLE = true;

    public function getName(): string { return self::NAME; }
    public function getType(): string { return self::TYPE; }
    public function getDescription(): string { return self::DESCRIPTION; }
    public function getIsFilterable(): bool { return self::IS_FILTERABLE; }
    public function getIsSortable(): bool { return self::IS_SORTABLE; }
}
