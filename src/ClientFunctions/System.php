<?php


class System
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }
    public function getSystemPlan($planName)
    {
        $requestHandler = new RequestHandler("GET", "system/plan/$planName");
        $requestHandler->executeHttpRequest();
    }
}
