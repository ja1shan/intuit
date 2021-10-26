Common Ledger - Developer Task - Intuit Integration
===================================================

Requirements
------
* Docker

* Developer Inruit Account

    1. Go to this url: https://developer.intuit.com/ and register a new account.

    1. When prompted select the 'QuickBooks Online' platform.

    1. Once registered create a new app by clicking on the 'Select APIs' button in the 'Just Start Coding' pane and select the Accounting API.

    1. When your app is created, you'll be taken to the 'My Apps' dashboard where you can select your new app.

    1. Under the 'Keys' tab on your app dashboard you'll see your development client keys as well as redirect URIs.
    
    1. Click on the 'Add URI' link and add http://localhost to your Redirect URIs, this will allow your local app to authenticate.

Setup
------

Update .env with `INTUIT_CLIENT_ID` and `INTUIT_CLIENT_SECRET` keys.

Run `composer install` 

`php artisan key:generate` or load http://localhost/ and generate your `APP_KEY` key

To run locally run  `./vendor/bin/sail up` in the root directory (Note: If you have other conflicting docker containers running already you can run `docker stop $(docker ps -a -q)`)

That's it, you should now be able to view the site at http://localhost/

Notes
-----------

* Adding new API Entities

    1. Add a new file (e.g. `QuickbookEntitySalesByProduct.php`) in `app/Models/QuickbooksApi/Entities/`. The class should extend `QuickbookEntity`
    
    1. Update the file with the required values and abstract functions
    
    1. Add the new Class to `QuickbooksEntityController` and call `getViewData`

* Adding new Entity type/field

    1. Add a new file (e.g. `QuickbooksTypeTotalAmt.php)` in `app/Models/QuickbooksApi/Types/`. The class should extend `QuickbooksType`
    
    1. Update the file with the required values and abstract functions
    
* To edit and run the application

    1. Run `npm install`
    
    2. Run `npm run dev` or `npm run watch`

Todo
-----------

* Add Create/Delete/Sparse etc. Endpoints

* Add server side authentication to replace storing sensitive data in client side local storage

* Add VueX for better state management

* Add Vue Router to create links/routes for each page
