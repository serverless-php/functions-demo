# Serverless PHP

An initial prototype for running PHP microservices inside AWS Lambda / Google Cloud Functions.

## Logging

From inside the function handler, you have access to a monolog instance `$this->logger()` as well as configuring custom handlers via the `setup()` method.

