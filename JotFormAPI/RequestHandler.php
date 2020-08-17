<?php


class RequestHandler implements RequestHandlerInterface
{
    private RequestType $requestType;
    private String $endPoint;
    private array $body = array();
    private array $header;

    public function __construct($requestType, $endPoint)
    {
        $this->requestType=$requestType;
        $this->endPoint= $endPoint;
        $this->header=array();
    }


    public function addHeader($key, $value)
    {
        $header[$key] = $value;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function setURL(array $params)
    {
        $end = $this->endPoint."?"; // /user?
        $url = null;
        foreach ($params as $key => $value) {
            $url = $key."=".$value."&"; //key=value&
        }
        return $end.$url;
    }

    public function executeHttpRequest()
    {
        if ($this->requestType == RequestType::POST && $this->body == null) {
            throw new Exception("POST Request should have a body.");
        }
        $apiGateway = SingletonAPIGateway::getInstance();
        $httpRequestObject = new HttpRequest();
    }
}
