<?php

namespace App;

use App\Middleware\LogUserDetails;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ServerlessPhp\ServerlessHandler;
use ServerlessPhp\Support\HandlesServerless;
use ServerlessPhp\Support\HasMiddleware;

class HelloWorld extends ServerlessHandler implements HandlesServerless
{
    public function setup(): void
    {
        $this->setMonologHandler(new StreamHandler('logs/helloworld.log', Logger::DEBUG));
    }

    public function handle(Request $request, Response $response): Response
    {
        $response->setContent('hello world :)');

        return $response;
    }
}