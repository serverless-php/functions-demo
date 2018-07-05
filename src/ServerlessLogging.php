<?php

namespace ServerlessPhp;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

trait ServerlessLogging
{

    /** @var AbstractProcessingHandler */
    protected $monologHandlers;

    private function configureLogging()
    {
        $monolog = new Logger('serverlessphp-logger');

        if (!$this->monologHandlers) {
            $this->setMonologHandler(
                new StreamHandler('logs/log.log', Logger::DEBUG)
            );
        }

        $monolog->setHandlers($this->monologHandlers);
        $this->logger = $monolog;
    }

    public function pushMonologHandler(AbstractProcessingHandler $handler)
    {
        array_push($this->monologHandlers, $handler);
    }

    public function setMonologHandler(AbstractProcessingHandler $handler)
    {
        $this->monologHandlers = [$handler];
    }
}