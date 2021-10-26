<?php

namespace App\Models\QuickbooksApi\Entities;

use App\Models\QuickbooksApi\Types\QuickbooksTypeId;
use App\Models\QuickbooksApi\Types\QuickbooksTypeVendorRef;

class QuickbookEntityBill extends QuickbookEntity
{
    private CONST READ_REQUEST_URL = '/v3/company/<realmID>/bill/<billId>';
    private CONST QUERY_CONTENT_TYPE = 'application/json';
    private const ATTRIBUTE_CLASSES = [
        QuickbooksTypeId::class,
        QuickbooksTypeVendorRef::class,
    ];
    private const REQUIRED_ATTRIBUTE_NAMES = [
        QuickbooksTypeId::NAME,
        QuickbooksTypeVendorRef::NAME,
    ];

    public function getTitle(): string {
        return 'Bill';
    }

    public function getDescription(): string {
        return 'A Bill object is an AP transaction representing a request-for-payment from a third party for goods/services rendered, received, or both.';
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
        $sample = '{"Bill":{"SyncToken":"2","domain":"QBO","APAccountRef":{"name":"Accounts Payable (A/P)","value":"33"},"VendorRef":{"name":"Norton Lumber and Building Materials","value":"46"},"TxnDate":"2014-11-06","TotalAmt":103.55,"CurrencyRef":{"name":"United States Dollar","value":"USD"},"LinkedTxn":[{"TxnId":"118","TxnType":"BillPaymentCheck"}],"SalesTermRef":{"value":"3"},"DueDate":"2014-12-06","sparse":false,"Line":[{"DetailType":"AccountBasedExpenseLineDetail","Amount":103.55,"Id":"1","AccountBasedExpenseLineDetail":{"TaxCodeRef":{"value":"TAX"},"AccountRef":{"name":"Job Expenses:Job Materials:Decks and Patios","value":"64"},"BillableStatus":"Billable","CustomerRef":{"name":"Travis Waldron","value":"26"}},"Description":"Lumber"}],"Balance":0,"Id":"25","MetaData":{"CreateTime":"2014-11-06T15:37:25-08:00","LastUpdatedTime":"2015-02-09T10:11:11-08:00"}},"time":"2015-02-09T10:17:20.251-08:00"}';
        return json_decode($sample);
    }

    public function getQuerySample(): string {
        return "select * from bill maxresults 2";
    }

    public function getQuerySampleResponse() : object {
        $sample = '{"QueryResponse":{"startPosition":1,"Estimate":[{"DocNumber":"1001","SyncToken":"0","domain":"QBO","TxnStatus":"Closed","BillEmail":{"Address":"Geeta@Kalapatapu.com"},"TxnDate":"2014-09-07","TotalAmt":582.5,"CustomerRef":{"name":"Geeta Kalapatapu","value":"10"},"CustomerMemo":{"value":"Thank you for your business and have a great day!"},"ShipAddr":{"City":"Middlefield","Line1":"1987 Main St.","PostalCode":"94303","Lat":"37.445013","Long":"-122.1391443","CountrySubDivisionCode":"CA","Id":"10"},"LinkedTxn":[{"TxnId":"103","TxnType":"Invoice"}],"PrintStatus":"NeedToPrint","BillAddr":{"Line3":"Middlefield, CA  94303","Line2":"1987 Main St.","Long":"-122.1178261","Line1":"Geeta Kalapatapu","Lat":"37.4530553","Id":"59"},"sparse":false,"EmailStatus":"NotSet","Line":[{"Description":"Rock Fountain","DetailType":"SalesItemLineDetail","SalesItemLineDetail":{"TaxCodeRef":{"value":"NON"},"Qty":1,"UnitPrice":275,"ItemRef":{"name":"Rock Fountain","value":"5"}},"LineNum":1,"Amount":275,"Id":"1"},{"Description":"Custom Design","DetailType":"SalesItemLineDetail","SalesItemLineDetail":{"TaxCodeRef":{"value":"NON"},"Qty":3.5,"UnitPrice":75,"ItemRef":{"name":"Design","value":"4"}},"LineNum":2,"Amount":262.5,"Id":"2"},{"Description":"Fountain Pump","DetailType":"SalesItemLineDetail","SalesItemLineDetail":{"TaxCodeRef":{"value":"NON"},"Qty":2,"UnitPrice":22.5,"ItemRef":{"name":"Pump","value":"11"}},"LineNum":3,"Amount":45,"Id":"3"},{"DetailType":"SubTotalLineDetail","Amount":582.5,"SubTotalLineDetail":{}}],"ApplyTaxAfterDiscount":false,"CustomField":[{"DefinitionId":"1","Type":"StringType","Name":"Crew #"}],"Id":"41","TxnTaxDetail":{"TotalTax":0},"MetaData":{"CreateTime":"2014-09-17T11:20:06-07:00","LastUpdatedTime":"2014-09-18T13:41:59-07:00"}}],"maxResults":1},"time":"2015-07-24T14:00:04.902-07:00"}';
        return json_decode($sample);
    }

    public function getReadSampleResponse() : object {
        $sample = '{"Bill":{"SyncToken":"2","domain":"QBO","APAccountRef":{"name":"Accounts Payable (A/P)","value":"33"},"VendorRef":{"name":"Norton Lumber and Building Materials","value":"46"},"TxnDate":"2014-11-06","TotalAmt":103.55,"CurrencyRef":{"name":"United States Dollar","value":"USD"},"LinkedTxn":[{"TxnId":"118","TxnType":"BillPaymentCheck"}],"SalesTermRef":{"value":"3"},"DueDate":"2014-12-06","sparse":false,"Line":[{"DetailType":"AccountBasedExpenseLineDetail","Amount":103.55,"Id":"1","AccountBasedExpenseLineDetail":{"TaxCodeRef":{"value":"TAX"},"AccountRef":{"name":"Job Expenses:Job Materials:Decks and Patios","value":"64"},"BillableStatus":"Billable","CustomerRef":{"name":"Travis Waldron","value":"26"}},"Description":"Lumber"}],"Balance":0,"Id":"25","MetaData":{"CreateTime":"2014-11-06T15:37:25-08:00","LastUpdatedTime":"2015-02-09T10:11:11-08:00"}},"time":"2015-02-09T10:17:20.251-08:00"}';
        return json_decode($sample);
    }
}
