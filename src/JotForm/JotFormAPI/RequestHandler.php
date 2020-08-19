<?php

namespace JotForm\JotFormAPI;

use Exception;

class RequestHandler
{
    private $header;

    public function __construct($apikey)
    {
        $this->header = array();
        $this->header["APIKEY"] = $apikey;
    }

    public function addHeader($key, $value)
    {
        $header[$key] = $value;
    }

    private function setURLParams($params, $endPoint)
    {
        $end = $endPoint . "?"; // /user?
        $url = null;
        foreach ($params as $key => $value) {
            $url = $key . "=" . $value . "&"; //key=value&
        }
        return $end . $url;
    }

    public function executeHttpRequest($requestType, $url, $params = null)
    {
        var_dump($this->header);
        var_dump($url);
        var_dump($params);

        //run request curl
        if ($requestType === "GET") {
            $url = $this->setURLParams($params, $url);
        }

        var_dump($url);
        //open connection
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JOTFORM_PHP_WRAPPER');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);

        switch ($requestType) {
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
                break;
            case 'PUT':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
                break;
            case 'DELETE':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }
        $result = curl_exec($ch);

        $result_obj = json_decode($result, true);

        if (!$result) {
            throw new Exception(curl_error($ch), 400);
        }
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_status != 200) {
            switch ($http_status) {
                case 400:
                case 403:
                case 404:
                    throw new \Exception($result_obj["message"], $http_status);
                    break;
                case 401:
                    throw new Exception("Invalid API key or Unauthorized API call", $http_status);
                    break;
                case 503:
                    throw new Exception("Service is unavailable, rate limits etc exceeded!", $http_status);
                    break;

                default:
                    throw new Exception($result_obj["info"], $http_status);
                    break;
            }
        }
        curl_close($ch);
        return $result_obj;
    }
}
