<?php

namespace App\Models\QuickbooksApi\Entities;

use App\Models\QuickbooksApi\Types\QuickbooksTypeId;
use App\Models\QuickbooksApi\Types\QuickbooksTypeName;

class QuickbookEntityAccount extends QuickbookEntity
{
    private const READ_REQUEST_URL = '/v3/company/<realmID>/account/<accountId>';
    private const QUERY_CONTENT_TYPE = 'text/plain';
    private const ATTRIBUTE_CLASSES = [
        QuickbooksTypeId::class,
        QuickbooksTypeName::class,
    ];
    private const REQUIRED_ATTRIBUTE_NAMES = [
        QuickbooksTypeId::NAME
    ];

    public function getTitle(): string {
        return 'Account';
    }

    public function getDescription(): string {
        return 'Accounts are what businesses use to track transactions. Accounts can track money coming in (income or revenue) and going out (expenses). They can also track the value of things (assets), like vehicles and equipment. There are five basic account types: asset, liability, income, expense, and equity. Accounts are part of the chart of accounts, the unique list of accounts each business puts together to do their accounting. Accountants often call accounts "ledgers". Learn more about accounts and the chart of accounts. The account object is what you\'ll use to do actions with the end-users accounts. Note: If you need to delete an account, set the Active attribute to false in an object update request. This makes it inactive. The account itself isn\'t permanently deleted, but is hidden for display purposes. References to inactive objects remain intact.';
    }

    public function getAttributeClasses(): array {
        return self::ATTRIBUTE_CLASSES;
    }

    public function getRequiredAttributeNames(): array {
        return self::REQUIRED_ATTRIBUTE_NAMES;
    }

    public function getReadRequestUrl(): string {
        return self::READ_REQUEST_URL;
    }

    public function getQueryContentType() : string {
        return self::QUERY_CONTENT_TYPE;
    }

    public function getSampleObject(): object {
        $sample = '{"Account":{"FullyQualifiedName":"MyJobs","domain":"QBO","Name":"MyJobs","Classification":"Asset","AccountSubType":"AccountsReceivable","CurrencyRef":{"name":"United States Dollar","value":"USD"},"CurrentBalanceWithSubAccounts":0,"sparse":false,"MetaData":{"CreateTime":"2014-12-31T09:29:05-08:00","LastUpdatedTime":"2014-12-31T09:29:05-08:00"},"AccountType":"Accounts Receivable","CurrentBalance":0,"Active":true,"SyncToken":"0","Id":"94","SubAccount":false},"time":"2014-12-31T09:29:05.717-08:00"}';
        return json_decode($sample);
    }

    public function getQuerySample(): string {
        return "select * from Account where Metadata.CreateTime > '2014-12-31'";
    }

    public function getQuerySampleResponse(): object {
        $sample = '{"QueryResponse":{"startPosition":1,"Account":[{"FullyQualifiedName":"Canadian Accounts Receivable","domain":"QBO","Name":"Canadian Accounts Receivable","Classification":"Asset","AccountSubType":"AccountsReceivable","CurrencyRef":{"name":"United States Dollar","value":"USD"},"CurrentBalanceWithSubAccounts":0,"sparse":false,"MetaData":{"CreateTime":"2015-06-23T09:38:18-07:00","LastUpdatedTime":"2015-06-23T09:38:18-07:00"},"AccountType":"Accounts Receivable","CurrentBalance":0,"Active":true,"SyncToken":"0","Id":"92","SubAccount":false},{"FullyQualifiedName":"MyClients","domain":"QBO","Name":"MyClients","Classification":"Asset","AccountSubType":"AccountsReceivable","CurrencyRef":{"name":"United States Dollar","value":"USD"},"CurrentBalanceWithSubAccounts":0,"sparse":false,"MetaData":{"CreateTime":"2015-07-13T12:34:47-07:00","LastUpdatedTime":"2015-07-13T12:34:47-07:00"},"AccountType":"Accounts Receivable","CurrentBalance":0,"Active":true,"SyncToken":"0","Id":"93","SubAccount":false},{"FullyQualifiedName":"MyJobs","domain":"QBO","Name":"MyJobs","Classification":"Asset","AccountSubType":"AccountsReceivable","CurrencyRef":{"name":"United States Dollar","value":"USD"},"CurrentBalanceWithSubAccounts":0,"sparse":false,"MetaData":{"CreateTime":"2015-01-13T10:29:27-08:00","LastUpdatedTime":"2015-01-13T10:29:27-08:00"},"AccountType":"Accounts Receivable","CurrentBalance":0,"Active":true,"SyncToken":"0","Id":"91","SubAccount":false}],"maxResults":3},"time":"2015-07-13T12:35:57.651-07:00"}';
        return json_decode($sample);
    }

    public function getReadSampleResponse(): object {
        $sample = '{"Account":{"FullyQualifiedName":"Accounts Payable (A/P)","domain":"QBO","Name":"Accounts Payable (A/P)","Classification":"Liability","AccountSubType":"AccountsPayable","CurrentBalanceWithSubAccounts":-1091.23,"sparse":false,"MetaData":{"CreateTime":"2014-09-12T10:12:02-07:00","LastUpdatedTime":"2015-06-30T15:09:07-07:00"},"AccountType":"Accounts Payable","CurrentBalance":-1091.23,"Active":true,"SyncToken":"0","Id":"33","SubAccount":false},"time":"2015-07-13T12:50:36.72-07:00"}';
        return json_decode($sample);
    }
}
