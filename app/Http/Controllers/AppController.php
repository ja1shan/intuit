<?php

namespace App\Http\Controllers;

use App\Services\QuickbooksService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AppController extends Controller
{
    public function index()
    {
        return view('intuit-app');
    }

    public function connect(): RedirectResponse
    {
        $dataService = new QuickbooksService();
        return Redirect::to($dataService->getAuthorizationCodeUrl());
    }
}
