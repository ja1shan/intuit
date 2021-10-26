<?php

namespace App\Services;

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Exception\SdkException;
use QuickBooksOnline\API\Exception\ServiceException;

class QuickbooksService
{
    const AUTH_MODE = 'oauth2';

    private DataService $quickbooksService;

    public function __construct()
    {
        try {
            $dataService = DataService::Configure(
                [
                    'auth_mode' => self::AUTH_MODE,
                    'ClientID' => env('INTUIT_CLIENT_ID'),
                    'ClientSecret' => env('INTUIT_CLIENT_SECRET'),
                    'RedirectURI' => env('INTUIT_REDIRECT_URI'),
                    'scope' => 'com.intuit.quickbooks.accounting',
                    'baseUrl' => env('INTUIT_ENV'),
                ]
            );
            $this->quickbooksService = $dataService;
        } catch (SdkException $e) {
            // todo: handle exception
        }
    }

    public function getAuthorizationCodeUrl(): string
    {
        $OAuth2LoginHelper = $this->quickbooksService->getOAuth2LoginHelper();

        return $OAuth2LoginHelper->getAuthorizationCodeURL();
    }

    public function getAccessToken(string $code, string $realmID)
    {
        $OAuth2LoginHelper = $this->quickbooksService->getOAuth2LoginHelper();

        try {
            return $OAuth2LoginHelper->exchangeAuthorizationCodeForToken($code, $realmID)->getAccessToken();
        } catch (SdkException $e) {
            // @todo: handle exception
        } catch (ServiceException $e) {
            // @todo: handle exception
        }
    }
}
