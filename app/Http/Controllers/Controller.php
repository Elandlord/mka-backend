<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use HelloHi\ApiClient\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        Client::init(
            "https://api.staging.hellohi.nl/v1/oauth/token",
            "https://api.staging.hellohi.nl/v1",
            env('API_OAUTH_CLIENT_ID'),
            env('API_OAUTH_SECRET'),
            env('API_USERNAME'),
            env('API_PASSWORD'),
            env('API_TENANT_ID')
        );
    }
}
