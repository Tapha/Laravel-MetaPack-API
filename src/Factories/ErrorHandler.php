<?php

namespace YourName\Boilerplate\Factories;

use Illuminate\Http\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use YourName\Boilerplate\Exceptions\NotFoundException;
use YourName\Boilerplate\Exceptions\BoilerplateErrorException;
use YourName\Boilerplate\Exceptions\MethodNotAllowedException;
use YourName\Boilerplate\Exceptions\BadPageException;
use YourName\Boilerplate\Exceptions\ExpansionFailedException;
use YourName\Boilerplate\Exceptions\HitRateLimitException;
use YourName\Boilerplate\Exceptions\InternalErrorException;
use YourName\Boilerplate\Exceptions\InvalidAuthException;
use YourName\Boilerplate\Exceptions\InvalidAuthHeaderException;
use YourName\Boilerplate\Exceptions\InvalidBatchException;
use YourName\Boilerplate\Exceptions\NoAuthException;
use YourName\Boilerplate\Exceptions\NotAuthorizedException;

class ErrorHandler
{
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            return $handler($request, $options)->then(function ($response) {
                if ($this->isSuccessful($response)) {
                    return $response;
                }
                $this->handleErrorResponse($response);
            });
        };
    }

    public function isSuccessful(ResponseInterface $response)
    {
        return $response->getStatusCode() < Response::HTTP_BAD_REQUEST;
    }

    /**
     * @param ResponseInterface $response
     * @throws BoilerplateErrorException
     * @throws Exception
     */
    public function handleErrorResponse(ResponseInterface $response)
    {
        $Boilerplate = json_decode($response->getBody()->getContents());

        switch ($Boilerplate->error) {
            case "INVALID_AUTH":
                throw new InvalidAuthException($Boilerplate->error_description, $Boilerplate->status_code);
            case "NOT_FOUND":
                throw new NotFoundException($Boilerplate->error_description, $Boilerplate->status_code);
            case "INVALID_AUTH_HEADER":
                throw new InvalidAuthHeaderException($Boilerplate->error_description, $Boilerplate->status_code);
            case "NO_AUTH":
                throw new NoAuthException($Boilerplate->error_description, $Boilerplate->status_code);
            case "BAD_PAGE":
                throw new BadPageException($Boilerplate->error_description, $Boilerplate->status_code);
            case "NOT_AUTHORIZED":
                throw new NotAuthorizedException($Boilerplate->error_description, $Boilerplate->status_code);
            case "METHOD_NOT_ALLOWED":
                throw new MethodNotAllowedException($Boilerplate->error_description, $Boilerplate->status_code);
            case "HIT_RATE_LIMIT":
                throw new HitRateLimitException($Boilerplate->error_description, $Boilerplate->status_code);
            case "INTERNAL_ERROR":
                throw new InternalErrorException($Boilerplate->error_description, $Boilerplate->status_code);
            case "EXPANSION_FAILED":
                throw new ExpansionFailedException($Boilerplate->error_description, $Boilerplate->status_code);
            case "INVALID_BATCH":
                throw new InvalidBatchException($Boilerplate->error_description, $Boilerplate->status_code);
            default:
                throw new BoilerplateErrorException($Boilerplate->error_description ? $Boilerplate->error_description : $Boilerplate->Boilerplate->code, $Boilerplate->status_code);

        }
    }
}
