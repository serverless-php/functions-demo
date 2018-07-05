<?php

require_once 'vendor/autoload.php';

$function = new \App\HelloWorld();
$function->setup();
$response = $function->execute();

dd($response);