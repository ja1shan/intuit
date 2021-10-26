<?php

namespace App\Models\QuickbooksApi\Entities;

use App\Models\QuickbooksApi\Types\QuickbooksTypeId;
use App\Models\QuickbooksApi\Types\QuickbooksTypeSyncToken;

class QuickbookEntityEmployee extends QuickbookEntity
{
    private CONST READ_REQUEST_URL = '/v3/company/<realmID>/employee/<realmID>';
    private CONST QUERY_CONTENT_TYPE = 'text/plain';
    private const ATTRIBUTE_CLASSES = [
        QuickbooksTypeId::class,
        QuickbooksTypeSyncToken::class,
    ];
    private const REQUIRED_ATTRIBUTE_NAMES = [
        QuickbooksTypeId::NAME,
        QuickbooksTypeSyncToken::NAME,
    ];

    public function getTitle(): string {
        return 'Employee';
    }

    public function getDescription(): string {
        return 'An Employee object represents a person working for the company. If you are looking to create a Contractor via API, refer how to create a Vendor object, with Vendor1099 field set to true.';
    }

    public function getAttributeClasses(): array{
        return self::ATTRIBUTE_CLASSES;
    }

    public function getRequiredAttributeNames(): array {
        return self::REQUIRED_ATTRIBUTE_NAMES;
    }

    public function getReadRequestUrl() : string {
        return self::READ_REQUEST_URL;
    }

    public function getQueryContentType() : string {
        return self::QUERY_CONTENT_TYPE;
    }

    public function getSampleObject(): object {
        $sample = '{"Employee":{"SyncToken":"0","domain":"QBO","DisplayName":"Bill Miller","PrimaryPhone":{"FreeFormNumber":"234-525-1234"},"PrintOnCheckName":"Bill Miller","FamilyName":"Miller","Active":true,"SSN":"XXX-XX-XXXX","PrimaryAddr":{"CountrySubDivisionCode":"CA","City":"Middlefield","PostalCode":"93242","Id":"116","Line1":"45 N. Elm Street"},"sparse":false,"BillableTime":false,"GivenName":"Bill","Id":"71","MetaData":{"CreateTime":"2015-07-24T09:34:35-07:00","LastUpdatedTime":"2015-07-24T09:34:35-07:00"}},"time":"2015-07-24T09:35:54.805-07:00"}';
        return json_decode($sample);
    }

    public function getQuerySample(): string {
        return "select * from Employee where DisplayName = 'Emily Platt'";
    }

    public function getQuerySampleResponse() : object {
        $sample = '{"QueryResponse":{"Employee":[{"SyncToken":"2","domain":"QBO","DisplayName":"Emily Platt","MiddleName":"Jane","FamilyName":"Platt","Active":true,"PrintOnCheckName":"Emily Platt","sparse":false,"BillableTime":false,"GivenName":"Emily","Id":"55","MetaData":{"CreateTime":"2014-09-17T11:21:48-07:00","LastUpdatedTime":"2015-07-01T11:29:40-07:00"}}],"startPosition":1,"maxResults":1},"time":"2015-07-24T08:56:55.808-07:00"}';
        return json_decode($sample);
    }

    public function getReadSampleResponse() : object {
        $sample = '{"Employee":{"SyncToken":"0","domain":"QBO","DisplayName":"Bill Miller","PrimaryPhone":{"FreeFormNumber":"234-525-1234"},"PrintOnCheckName":"Bill Miller","FamilyName":"Miller","Active":true,"SSN":"XXX-XX-XXXX","PrimaryAddr":{"CountrySubDivisionCode":"CA","City":"Middlefield","PostalCode":"93242","Id":"116","Line1":"45 N. Elm Street"},"sparse":false,"BillableTime":false,"GivenName":"Bill","Id":"71","MetaData":{"CreateTime":"2015-07-24T09:34:35-07:00","LastUpdatedTime":"2015-07-24T09:34:35-07:00"}},"time":"2015-07-24T09:35:54.805-07:00"}';
        return json_decode($sample);
    }
}
