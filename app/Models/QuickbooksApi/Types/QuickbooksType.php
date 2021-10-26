<?php

namespace App\Models\QuickbooksApi\Types;

abstract class QuickbooksType {

    public function getTypeInfo()
    {
        return [
            'name' => $this->getName(),
            'type' => $this->getType(),
            'description' => $this->getDescription(),
            'filterable' => $this->getIsFilterable(),
            'sortable' => $this->getIsSortable(),
        ];
    }

    abstract public function getName(): string;
    abstract public function getType(): string;
    abstract public function getDescription(): string;
    abstract public function getIsFilterable(): bool;
    abstract public function getIsSortable() : bool;
}
