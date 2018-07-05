<?php

namespace ServerlessPhp\Support;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface HandlesServerless {
    public function handle(Request $request, Response $response) : Response;
    public function setup() : void;
}