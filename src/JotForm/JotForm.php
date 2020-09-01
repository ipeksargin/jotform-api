<?php

namespace JotForm;

use GuzzleHttp\Client;
use JotForm\Resources\Folders;
use JotForm\Resources\Forms;
use JotForm\Resources\Reports;
use JotForm\Resources\Submissions;
use JotForm\Resources\Systems;
use JotForm\Resources\Users;

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
     * @var Users
     */
    public $users;

    /**
     * @var Forms
     */
    public $forms;

    /**
     * @var Folders
     */
    public $folders;

    /**
     * @var Reports
     */
    public $reports;

    /**
     * @var Systems
     */
    public $systems;

    /**
     * @var Submissions
     */
    public $submissions;

    /**
     * JotForm constructor.
     * @param RequestHandler $handler
     * @param string $baseURL
     */
    public function __construct(RequestHandler $handler, string $baseURL = "https://api.jotform.com")
    {
        $this->users = new Users($this);
        $this->forms = new Forms($this);
        $this->folders = new Folders($this);
        $this->reports = new Reports($this);
        $this->systems = new Systems($this);
        $this->submissions = new Submissions($this);
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
        $responseBody = $response->getBody()->getContents();
        return \GuzzleHttp\json_decode($responseBody, true);
    }
}
