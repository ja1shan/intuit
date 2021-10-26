<?php

namespace App\Models\QuickbooksApi\Entities;

use App\Models\QuickbooksApi\Types\QuickbooksTypeId;
use App\Models\QuickbooksApi\Types\QuickbooksTypeSyncToken;

class QuickbookEntityCustomer extends QuickbookEntity
{
    private CONST READ_REQUEST_URL = '/v3/company/<realmID>/customer/<realmID>';
    private CONST QUERY_CONTENT_TYPE = 'application/json';
    private const ATTRIBUTE_CLASSES = [
        QuickbooksTypeId::class,
        QuickbooksTypeSyncToken::class,
    ];
    private const REQUIRED_ATTRIBUTE_NAMES = [
        QuickbooksTypeId::NAME,
        QuickbooksTypeSyncToken::NAME,
    ];

    public function getTitle(): string {
        return 'Customer';
    }

    public function getDescription(): string {
        return 'A customer is a consumer of the service or product that your business offers. An individual customer can have an underlying nested structure, with a parent customer (the top-level object) having zero or more sub-customers and jobs associated with it.';
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
        $sample = '{"Customer":{"PrimaryEmailAddr":{"Address":"Surf@Intuit.com"},"SyncToken":"0","domain":"QBO","GivenName":"Bill","DisplayName":"Bill\'s Windsurf Shop","BillWithParent":false,"FullyQualifiedName":"Bill\'s Windsurf Shop","CompanyName":"Bill\'s Windsurf Shop","FamilyName":"Lucchini","sparse":false,"PrimaryPhone":{"FreeFormNumber":"(415) 444-6538"},"Active":true,"Job":false,"BalanceWithJobs":85,"BillAddr":{"City":"Half Moon Bay","Line1":"12 Ocean Dr.","PostalCode":"94213","Lat":"37.4307072","Long":"-122.4295234","CountrySubDivisionCode":"CA","Id":"3"},"PreferredDeliveryMethod":"Print","Taxable":false,"PrintOnCheckName":"Bill\'s Windsurf Shop","Balance":85,"Id":"2","MetaData":{"CreateTime":"2014-09-11T16:49:28-07:00","LastUpdatedTime":"2014-09-18T12:56:01-07:00"}},"time":"2015-07-23T11:04:15.496-07:00"}';
        return json_decode($sample);
    }

    public function getQuerySample(): string {
        return "select * from Customer Where Metadata.LastUpdatedTime > '2015-03-01'";
    }

    public function getQuerySampleResponse() : object {
        $sample = '{"QueryResponse":{"Customer":[{"domain":"QBO","FamilyName":"Lauterbach","DisplayName":"Amy\'s Bird Sanctuary","DefaultTaxCodeRef":{"value":"2"},"PrimaryEmailAddr":{"Address":"Birds@Intuit.com"},"PreferredDeliveryMethod":"Print","GivenName":"Amy","FullyQualifiedName":"Amy\'s Bird Sanctuary","BillWithParent":false,"Job":false,"BalanceWithJobs":274,"PrimaryPhone":{"FreeFormNumber":"(650) 555-3311"},"Active":true,"MetaData":{"CreateTime":"2014-09-11T16:48:43-07:00","LastUpdatedTime":"2015-07-01T10:14:15-07:00"},"BillAddr":{"City":"Bayshore","Line1":"4581 Finch St.","PostalCode":"94326","Lat":"INVALID","Long":"INVALID","CountrySubDivisionCode":"CA","Id":"2"},"MiddleName":"Michelle","Notes":"Note added via Update operation.","Taxable":true,"Balance":274,"SyncToken":"5","CompanyName":"Amy\'s Bird Sanctuary","ShipAddr":{"City":"Bayshore","Line1":"4581 Finch St.","PostalCode":"94326","Lat":"INVALID","Long":"INVALID","CountrySubDivisionCode":"CA","Id":"109"},"PrintOnCheckName":"Amy\'s Bird Sanctuary","sparse":false,"Id":"1"},{"domain":"QBO","PrimaryEmailAddr":{"Address":"Consulting@intuit.com"},"DisplayName":"Weiskopf Consulting","FamilyName":"Weiskopf","PreferredDeliveryMethod":"Print","GivenName":"Nicola","FullyQualifiedName":"Weiskopf Consulting","BillWithParent":false,"Job":false,"BalanceWithJobs":390,"PrimaryPhone":{"FreeFormNumber":"(650) 555-1423"},"Active":true,"MetaData":{"CreateTime":"2014-09-11T17:29:04-07:00","LastUpdatedTime":"2015-06-24T15:54:02-07:00"},"BillAddr":{"City":"Bayshore","Line1":"45612 Main St.","PostalCode":"94326","Lat":"45.256574","Long":"-66.0943698","CountrySubDivisionCode":"CA","Id":"30"},"Taxable":false,"Balance":390,"SyncToken":"0","CompanyName":"Weiskopf Consulting","ShipAddr":{"City":"Bayshore","Line1":"45612 Main St.","PostalCode":"94326","Lat":"45.256574","Long":"-66.0943698","CountrySubDivisionCode":"CA","Id":"30"},"PrintOnCheckName":"Weiskopf Consulting","sparse":false,"Id":"29"}],"startPosition":1,"maxResults":6},"time":"2015-07-23T11:02:25.149-07:00"}';
        return json_decode($sample);
    }

    public function getReadSampleResponse() : object {
        $sample = '{"Customer":{"PrimaryEmailAddr":{"Address":"Surf@Intuit.com"},"SyncToken":"0","domain":"QBO","GivenName":"Bill","DisplayName":"Bill\'s Windsurf Shop","BillWithParent":false,"FullyQualifiedName":"Bill\'s Windsurf Shop","CompanyName":"Bill\'s Windsurf Shop","FamilyName":"Lucchini","sparse":false,"PrimaryPhone":{"FreeFormNumber":"(415) 444-6538"},"Active":true,"Job":false,"BalanceWithJobs":85,"BillAddr":{"City":"Half Moon Bay","Line1":"12 Ocean Dr.","PostalCode":"94213","Lat":"37.4307072","Long":"-122.4295234","CountrySubDivisionCode":"CA","Id":"3"},"PreferredDeliveryMethod":"Print","Taxable":false,"PrintOnCheckName":"Bill\'s Windsurf Shop","Balance":85,"Id":"2","MetaData":{"CreateTime":"2014-09-11T16:49:28-07:00","LastUpdatedTime":"2014-09-18T12:56:01-07:00"}},"time":"2015-07-23T11:04:15.496-07:00"}';
        return json_decode($sample);
    }
}
