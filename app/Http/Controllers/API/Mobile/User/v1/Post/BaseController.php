<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
