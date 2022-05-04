<?php

namespace tapha\MetaPack\Factories;

use Illuminate\Http\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use tapha\MetaPack\Exceptions\NotFoundException;
use tapha\MetaPack\Exceptions\MetaPackErrorException;
use tapha\MetaPack\Exceptions\MethodNotAllowedException;
use tapha\MetaPack\Exceptions\BadPageException;
use tapha\MetaPack\Exceptions\ExpansionFailedException;
use tapha\MetaPack\Exceptions\HitRateLimitException;
use tapha\MetaPack\Exceptions\InternalErrorException;
use tapha\MetaPack\Exceptions\MetaPackInvalidAuthException;
use tapha\MetaPack\Exceptions\InvalidAuthHeaderException;
use tapha\MetaPack\Exceptions\InvalidBatchException;
use tapha\MetaPack\Exceptions\NoAuthException;
use tapha\MetaPack\Exceptions\NotAuthorizedException;

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
     * @throws MetaPackErrorException
     * @throws Exception
     */
    public function handleErrorResponse(ResponseInterface $response)
    {
        $metaPack = json_decode($response->getBody()->getContents());

        switch ($metaPack->errorCode) {
            case "MP-1113G":
                throw new MetaPackInvalidAuthException($metaPack->message);
            // case "NOT_FOUND":
            //     throw new NotFoundException($metaPack->error_description, $metaPack->status_code);
            // case "INVALID_AUTH_HEADER":
            //     throw new InvalidAuthHeaderException($metaPack->error_description, $metaPack->status_code);
            // case "NO_AUTH":
            //     throw new NoAuthException($metaPack->error_description, $metaPack->status_code);
            // case "BAD_PAGE":
            //     throw new BadPageException($metaPack->error_description, $metaPack->status_code);
            // case "NOT_AUTHORIZED":
            //     throw new NotAuthorizedException($metaPack->error_description, $metaPack->status_code);
            // case "METHOD_NOT_ALLOWED":
            //     throw new MethodNotAllowedException($metaPack->error_description, $metaPack->status_code);
            // case "HIT_RATE_LIMIT":
            //     throw new HitRateLimitException($metaPack->error_description, $metaPack->status_code);
            // case "INTERNAL_ERROR":
            //     throw new InternalErrorException($metaPack->error_description, $metaPack->status_code);
            // case "EXPANSION_FAILED":
            //     throw new ExpansionFailedException($metaPack->error_description, $metaPack->status_code);
            // case "INVALID_BATCH":
            //     throw new InvalidBatchException($metaPack->error_description, $metaPack->status_code);
            default:
                throw new MetaPackErrorException($metaPack->error_description ? $metaPack->error_description : $metaPack->metaPack->code, $metaPack->status_code);

        }
    }
}
