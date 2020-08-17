<?php


class Report
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }
    public function getReport($reportId)
    {
        $requestHandler = new RequestHandler("GET", "report/{$reportId}");
        $requestHandler->executeHttpRequest();
    }

    public function deleteReport($reportId)
    {
        $requestHandler = new RequestHandler("DELETE", "report/{$reportId}");
        $requestHandler->executeHttpRequest();
    }
}
