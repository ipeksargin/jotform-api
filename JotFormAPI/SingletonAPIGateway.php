<?php


class SingletonAPIGateway
{
    private static SingletonAPIGateway $instance;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new SingletonAPIGateway();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    public function runRequest(HttpRequest $request)
    {
        $httpResponse = new HttpResponse();
        //executions
        return $httpResponse;
    }
}
