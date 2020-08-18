<?php

class RequestHandler
{
    private array $header;

    public function __construct()
    {
    }

    public function addHeader($key, $value)
    {
        $header[$key] = $value;
    }

    private function setURLParams(array $params, $endPoint)
    {
        $end = $endPoint."?"; // /user?
        $url = null;
        foreach ($params as $key => $value) {
            $url = $key."=".$value."&"; //key=value&
        }
        return $end.$url;
    }

    public function executeHttpRequest($requestType, $url, array $params = null)
    {
        //run request curl
        if ($requestType === "GET") {
            $url = $this->setURLParams($params, $url);
        } elseif ($requestType == "POST") {
            $jsonData = json_encode($params);
        }
        return null;
    }
}
