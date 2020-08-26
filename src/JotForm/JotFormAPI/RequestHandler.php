<?php

namespace JotForm\JotFormAPI;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class RequestHandler
 * @package JotForm\JotFormAPI
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

        $request = $this->client->request($requestType, $url, $options);
        return $request;
    }
}
