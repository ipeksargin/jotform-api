<?php

namespace JotForm;

use GuzzleHttp\Client;
use JotForm\ClientFunctions\Folder;
use JotForm\ClientFunctions\Form;
use JotForm\ClientFunctions\Report;
use JotForm\ClientFunctions\Submission;
use JotForm\ClientFunctions\System;
use JotForm\ClientFunctions\User;
use JotForm\Errors\AuthorizationException;
use JotForm\Errors\BadGatewayException;
use JotForm\Errors\BadRequestException;
use JotForm\Errors\DefaultException;
use JotForm\Errors\ForbiddenException;
use JotForm\Errors\NotFoundException;
use JotForm\Errors\NotImplementedException;
use JotForm\Errors\ServerException;
use JotForm\Errors\ServiceUnavailableException;
use JotForm\JotFormAPI\DateOptions\Action;
use JotForm\JotFormAPI\DateOptions\Date;
use JotForm\JotFormAPI\DateOptions\SortBy;
use JotForm\JotFormAPI\DateOptions\StartDate;
use JotForm\JotFormAPI\FilterOptions\Filter;
use JotForm\JotFormAPI\FilterOptions\Limit;
use JotForm\JotFormAPI\FilterOptions\Offset;
use JotForm\JotFormAPI\FilterOptions\OrderBy;
use JotForm\JotFormAPI\RequestHandler;

/**
 * Class JotForm
 * @package JotForm
 */
class JotForm
{
    /**
     * @var string
     */
    private $baseURL;

    /**
     * @var RequestHandler
     */
    private $requestHandler;

    /**
     * @var User
     */
    public $users;

    /**
     * @var Form
     */
    public $forms;

    /**
     * @var Folder
     */
    public $folders;

    /**
     * @var Report
     */
    public $reports;

    /**
     * @var System
     */
    public $systems;

    /**
     * @var Submission
     */
    public $submissions;

    /**
     * JotForm constructor.
     * @param RequestHandler $handler
     * @param string $baseURL
     */
    public function __construct(RequestHandler $handler, string $baseURL = "https://api.jotform.com")
    {
        $this->users = new User($this);
        $this->forms = new Form($this);
        $this->folders = new Folder($this);
        $this->reports = new Report($this);
        $this->systems = new System($this);
        $this->submissions = new Submission($this);
        $this->requestHandler = $handler;
        $this->baseURL = $baseURL;
    }

    /**
     * @param string $apiKey
     * @param string $baseURL
     * @return JotForm
     */
    public static function create(string $apiKey, $baseURL = "https://api.jotform.com")
    {
        $client = new Client([
            "base_uri" => $baseURL,
            "headers" => [
                "apiKey" => $apiKey,
            ],
        ]);
        return new JotForm(new RequestHandler($client), $baseURL);
    }

    /**
     * @param string $requestType
     * @param string $endpoint
     * @param array $params
     * @return array|bool|float|int|object|string|null
     */
    public function request(string $requestType, string $endpoint, $params = [])
    {
        $response = $this->requestHandler->executeHttpRequest($requestType, $endpoint, $params);
        $this->exceptionHandling($response);
        $responseBody = $response->getBody()->getContents();
        return \GuzzleHttp\json_decode($responseBody, true);
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
    private function exceptionHandling($response)
    {
        $statusCode = $response->getStatusCode();
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
                    throw new NotFoundException($response["message"], $statusCode);
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
                    throw new DefaultException($response["info"], $statusCode);
                    break;
            }
        }
    }
}
