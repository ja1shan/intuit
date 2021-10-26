<?php

namespace App\Models\QuickbooksApi\Types;

class QuickbooksTypeSyncToken extends QuickbooksType {
    public const NAME = 'SyncToken';
    public const TYPE = 'String';
    public const DESCRIPTION = 'Version number of the object. It is used to lock an object for use by one app at a time. As soon as an application modifies an object, its SyncToken is incremented. Attempts to modify an object specifying an older SyncToken fails. Only the latest version of the object is maintained by QuickBooks Online.';
    public const IS_FILTERABLE = false;
    public const IS_SORTABLE = false;

    public function getName(): string { return self::NAME; }
    public function getType(): string { return self::TYPE; }
    public function getDescription(): string { return self::DESCRIPTION; }
    public function getIsFilterable(): bool { return self::IS_FILTERABLE; }
    public function getIsSortable(): bool { return self::IS_SORTABLE; }
}
