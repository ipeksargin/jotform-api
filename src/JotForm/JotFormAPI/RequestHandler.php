<?php

namespace JotForm\JotFormAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class RequestHandler
{
    private $header;

    public function __construct($apiKey)
    {
        $this->header = array();
        $this->header["apiKey"] = $apiKey;
    }

    public function addHeader($key, $value)
    {
        $header[$key] = $value;
    }

    private function setURLParams($params = [], $endPoint = "")
    {
        $end = $endPoint . "?"; // /user?
        $url = null;
        foreach ($params as $key => $value) {
            $url = $key . "=" . $value . "&"; //key=value&
        }
        return $end . $url;
    }

    public function executeHttpRequest($requestType, $url, $params = [])
    {
        $client = new Client([]);

        if ($requestType === "GET") {
            $url = $this->setURLParams($params, $url);
            $request = new Request($requestType, $url, $this->header);
        } else {
            $request = new Request($requestType, $url, $this->header, json_encode($params));
        }
        return $client->send($request);
    }
}
