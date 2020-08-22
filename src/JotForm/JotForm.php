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
use JotForm\JotFormAPI\RequestHandler;

class JotForm
{
    private static $baseURL;
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

    public static function create($apiKey, $baseURL = "https://api.jotform.com")
    {
        $client = new Client([
            "base_uri" => $baseURL,
            "headers" => [
                "apiKey" => $apiKey,
            ],
        ]);
        return new JotForm(new RequestHandler($client), $baseURL);
    }

    public function registerDetails($username, $password, $email)
    {
        return $params = array($username, $password, $email);
    }

    public function historyDetail($action = null, $date = null, $sortBy = null, $startDate = null, $endDate = null)
    {
        return $params = array($action, $date, $sortBy, $startDate, $endDate);
    }

    public function filterOrder($offset = 0, $limit = 0, $orderBy = null, $filter = null)
    {
        return $params = array($offset, $limit, $orderBy, json_encode($filter));
    }

    public function request($requestType, $endpoint, $params = [])
    {
        $response = $this->requestHandler->executeHttpRequest($requestType, $endpoint, $params);
        $this->exceptionHandling($response);
        $responseBody = $response->getBody()->getContents();
        return \GuzzleHttp\json_decode($responseBody, true);
    }

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
