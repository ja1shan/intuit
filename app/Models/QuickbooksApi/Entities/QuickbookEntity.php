<?php

namespace App\Models\QuickbooksApi\Entities;

use App\Models\QuickbooksApi\Types\QuickbooksType;

abstract class QuickbookEntity {

    const QUERY_URL = '/v3/company/<realmID>/query?query=<selectStatement>';
    const PRODUCTION_URL = 'https://quickbooks.api.intuit.com';
    const SANDBOX_URL = 'https://sandbox-quickbooks.api.intuit.com';

    abstract public function getTitle() : string;
    abstract public function getDescription() : string;

    abstract public function getAttributeClasses() : array;
    abstract public function getRequiredAttributeNames() : array;

    abstract public function getReadRequestUrl() : string;
    abstract public function getQueryContentType() : string;

    abstract public function getSampleObject() : object;
    abstract public function getQuerySample() : string;
    abstract public function getQuerySampleResponse() : object;
    abstract public function getReadSampleResponse() : object;

    public function getAttributeObject(): array
    {
        $attributeObject = [];
        foreach ($this->getAttributeClasses() as $attributeClass) {
            /** @var QuickbooksType $attribute */
            $attribute = new $attributeClass();
            $attributeObject[] = $attribute->getTypeInfo();
        }
        return $attributeObject;
    }

    public function getViewData(): array
    {
        return [
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'sample_object' => [
                'attributes' => $this->getAttributeObject(),
                'sample' => $this->getSampleObject(),
                'required_fields' => $this->getRequiredAttributeNames(),
            ],
            'query_object' => [
                'request_url' => self::QUERY_URL,
                'request_url_content_type' => $this->getQueryContentType(),
                'request_url_example' => $this->getRequestUrlExample(),
                'sample_query' => $this->getQuerySample(),
                'sample' => $this->getQuerySampleResponse(),
            ],
            'read_object' => [
                'request_url' => $this->getReadRequestUrl(),
                'request_url_example' => $this->getReadUrlExample(),
                'sample' => $this->getQuerySampleResponse(),
            ],
        ];
    }

    private function getRequestUrlExample(): string
    {
        return 'GET ' . self::QUERY_URL . '

Content type:' . $this->getQueryContentType() . '
Production Base URL:' . self::PRODUCTION_URL . '
Sandbox Base URL:' . self::SANDBOX_URL;
    }

    private function getReadUrlExample(): string
    {
        return 'GET ' . $this->getReadRequestUrl() . '

Production Base URL:' . self::PRODUCTION_URL . '
Sandbox Base URL:' . self::SANDBOX_URL;
    }
}
