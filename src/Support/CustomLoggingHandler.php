<?php

namespace ServerlessPhp\Support;

interface CustomLoggingHandler {
    public function pushMonologHandler() : void;
}