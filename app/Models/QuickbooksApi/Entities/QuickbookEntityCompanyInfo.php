<?php

namespace App\Models\QuickbooksApi\Entities;

use App\Models\QuickbooksApi\Types\QuickbooksTypeId;
use App\Models\QuickbooksApi\Types\QuickbooksTypeSyncToken;

class QuickbookEntityCompanyInfo extends QuickbookEntity
{
    private CONST READ_REQUEST_URL = '/v3/company/<realmID>/companyinfo/<realmID>';
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
        return 'CompanyInfo';
    }

    public function getDescription(): string {
        return 'The CompanyInfo object contains basic company information. In QuickBooks, company info and preferences are displayed in the same place under preferences, so it may be confusing to figure out from user interface which fields may belong to this object. But in general, properties such as company addresses or name are considered company information. Some attributes may exist in both CompanyInfo and Preferences objects.';
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
        $sample = '{"CompanyInfo":{"SyncToken":"4","domain":"QBO","LegalAddr":{"City":"Mountain View","Country":"US","Line1":"2500 Garcia Ave","PostalCode":"94043","CountrySubDivisionCode":"CA","Id":"1"},"SupportedLanguages":"en","CompanyName":"Larry\'s Bakery","Country":"US","CompanyAddr":{"City":"Mountain View","Country":"US","Line1":"2500 Garcia Ave","PostalCode":"94043","CountrySubDivisionCode":"CA","Id":"1"},"sparse":false,"Id":"1","WebAddr":{},"FiscalYearStartMonth":"January","CustomerCommunicationAddr":{"City":"Mountain View","Country":"US","Line1":"2500 Garcia Ave","PostalCode":"94043","CountrySubDivisionCode":"CA","Id":"1"},"PrimaryPhone":{"FreeFormNumber":"(650)944-4444"},"LegalName":"Larry\'s Bakery","CompanyStartDate":"2015-06-05","Email":{"Address":"donotreply@intuit.com"},"NameValue":[{"Name":"NeoEnabled","Value":"true"},{"Name":"IndustryType","Value":"Bread and Bakery Product Manufacturing"},{"Name":"IndustryCode","Value":"31181"},{"Name":"SubscriptionStatus","Value":"PAID"},{"Name":"OfferingSku","Value":"QuickBooks Online Plus"},{"Name":"PayrollFeature","Value":"true"},{"Name":"AccountantFeature","Value":"false"}],"MetaData":{"CreateTime":"2015-06-05T13:55:54-07:00","LastUpdatedTime":"2015-07-06T08:51:50-07:00"}},"time":"2015-07-10T09:38:58.155-07:00"}';
        return json_decode($sample);
    }

    public function getQuerySample(): string {
        return "select * from CompanyInfo";
    }

    public function getQuerySampleResponse() : object {
        $sample = '{"CompanyInfo":{"SyncToken":"4","domain":"QBO","LegalAddr":{"City":"Mountain View","Country":"US","Line1":"2500 Garcia Ave","PostalCode":"94043","CountrySubDivisionCode":"CA","Id":"1"},"SupportedLanguages":"en","CompanyName":"Larry\'s Bakery","Country":"US","CompanyAddr":{"City":"Mountain View","Country":"US","Line1":"2500 Garcia Ave","PostalCode":"94043","CountrySubDivisionCode":"CA","Id":"1"},"sparse":false,"Id":"1","WebAddr":{},"FiscalYearStartMonth":"January","CustomerCommunicationAddr":{"City":"Mountain View","Country":"US","Line1":"2500 Garcia Ave","PostalCode":"94043","CountrySubDivisionCode":"CA","Id":"1"},"PrimaryPhone":{"FreeFormNumber":"(650)944-4444"},"LegalName":"Larry\'s Bakery","CompanyStartDate":"2015-06-05","Email":{"Address":"donotreply@intuit.com"},"NameValue":[{"Name":"NeoEnabled","Value":"true"},{"Name":"IndustryType","Value":"Bread and Bakery Product Manufacturing"},{"Name":"IndustryCode","Value":"31181"},{"Name":"SubscriptionStatus","Value":"PAID"},{"Name":"OfferingSku","Value":"QuickBooks Online Plus"},{"Name":"PayrollFeature","Value":"true"},{"Name":"AccountantFeature","Value":"false"}],"MetaData":{"CreateTime":"2015-06-05T13:55:54-07:00","LastUpdatedTime":"2015-07-06T08:51:50-07:00"}},"time":"2015-07-10T09:38:58.155-07:00"}';
        return json_decode($sample);
    }

    public function getReadSampleResponse() : object {
        $sample = '{"CompanyInfo":{"SyncToken":"4","domain":"QBO","LegalAddr":{"City":"Mountain View","Country":"US","Line1":"2500 Garcia Ave","PostalCode":"94043","CountrySubDivisionCode":"CA","Id":"1"},"SupportedLanguages":"en","CompanyName":"Larry\'s Bakery","Country":"US","CompanyAddr":{"City":"Mountain View","Country":"US","Line1":"2500 Garcia Ave","PostalCode":"94043","CountrySubDivisionCode":"CA","Id":"1"},"sparse":false,"Id":"1","WebAddr":{},"FiscalYearStartMonth":"January","CustomerCommunicationAddr":{"City":"Mountain View","Country":"US","Line1":"2500 Garcia Ave","PostalCode":"94043","CountrySubDivisionCode":"CA","Id":"1"},"PrimaryPhone":{"FreeFormNumber":"(650)944-4444"},"LegalName":"Larry\'s Bakery","CompanyStartDate":"2015-06-05","Email":{"Address":"donotreply@intuit.com"},"NameValue":[{"Name":"NeoEnabled","Value":"true"},{"Name":"IndustryType","Value":"Bread and Bakery Product Manufacturing"},{"Name":"IndustryCode","Value":"31181"},{"Name":"SubscriptionStatus","Value":"PAID"},{"Name":"OfferingSku","Value":"QuickBooks Online Plus"},{"Name":"PayrollFeature","Value":"true"},{"Name":"AccountantFeature","Value":"false"}],"MetaData":{"CreateTime":"2015-06-05T13:55:54-07:00","LastUpdatedTime":"2015-07-06T08:51:50-07:00"}},"time":"2015-07-10T09:38:58.155-07:00"}';
        return json_decode($sample);
    }
}
