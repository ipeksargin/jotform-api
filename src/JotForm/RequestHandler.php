<?php

namespace JotForm;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JotForm\Errors\AuthorizationException;
use JotForm\Errors\BadGatewayException;
use JotForm\Errors\BadRequestException;
use JotForm\Errors\DefaultException;
use JotForm\Errors\ForbiddenException;
use JotForm\Errors\NotFoundException;
use JotForm\Errors\NotImplementedException;
use JotForm\Errors\ServerException;
use JotForm\Errors\ServiceUnavailableException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class RequestHandler
 * @package JotForm
 */
class RequestHandler
{
    /**
     * @var Client
     */
    private $client;

    /**
     * RequestHandler constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $requestType
     * @param string $url
     * @param array $params
     * @return ResponseInterface
     */
    public function executeHttpRequest($requestType, $url, $params = [])
    {
        $options = [];

        if (!empty($params)) {
            if ($requestType === "GET") {
                $options = ["query" => $params];
            } else {
                $options = ["form_params" => $params];
            }
        }

        try {
            $request = $this->client->request($requestType, $url, $options);
        } catch (GuzzleException $e) {
            $statusCode = $e->getCode();
            $this->exceptionHandling($statusCode);
        }
        return $request;
    }

    /**
     * @param $response
     * @throws AuthorizationException
     * @throws BadGatewayException
     * @throws BadRequestException
     * @throws DefaultException
     * @throws ForbiddenException
     * @throws NotFoundException
     * @throws NotImplementedException
     * @throws ServerException
     * @throws ServiceUnavailableException
     */
    private function exceptionHandling($statusCode)
    {
        if ($statusCode != 200) {
            switch ($statusCode) {
                case 400:
                    throw new BadRequestException("Bad request.", $statusCode);
                    break;
                case 401:
                    throw new AuthorizationException("Invalid API key or unauthorized API call.", $statusCode);
                    break;
                case 403:
                    throw new ForbiddenException("Dont have access rights to the content.", $statusCode);
                    break;
                case 404:
                    throw new NotFoundException("Not found the requested source.", $statusCode);
                    break;
                case 500:
                    throw new ServerException("Internal server error.", $statusCode);
                    break;
                case 501:
                    throw new NotImplementedException("Request method not supported.", $statusCode);
                    break;
                case 502:
                    throw new BadGatewayException("Service is unavailable, rate limits etc exceeded!", $statusCode);
                    break;
                case 503:
                    throw new ServiceUnavailableException("Service is unavailable or overloaded", $statusCode);
                    break;

                default:
                    throw new DefaultException($statusCode);
                    break;
            }
        }
    }
}
