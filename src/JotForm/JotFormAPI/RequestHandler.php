<?php

namespace JotForm\JotFormAPI;

use GuzzleHttp\Client;

class RequestHandler
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

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
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
            die;
        }
        return $request;
    }
}
