<?php

namespace ServerlessPhp;

use Illuminate\Http\Response;
use Monolog\Logger;
use ServerlessPhp\Support\HasMiddleware;

class ServerlessHandler
{
    /** @var \Monolog\Logger */
    protected $logger;

    use ServerlessLogging;

    /**
     * @return Response
     */
    public function execute(): Response
    {
        $this->configureLogging();
        $this->logger->info('Logger ready');

        try {
            return $this->handle(
                $request = \Illuminate\Http\Request::capture(),
                $response = new Response()
            );
        } catch (\Exception $exception) {
            $this->logger->addCritical(
                $exception->getMessage(),
                $exception->getTrace()
            );

            return (new Response())
                ->setContent('error - ' . $exception->getTraceAsString())
                ->setStatusCode(500);
        }
    }

    /**
     * @return Logger
     */
    public function logger(): Logger
    {
        return $this->logger;
    }

}