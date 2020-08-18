<?php
namespace JotForm;

class Report extends AbstractClient
{
    public function getReport($reportId)
    {
        $this->client->request("GET", "report/{$reportId}");
    }

    public function deleteReport($reportId)
    {
        $this->client->request("DELETE", "report/{$reportId}");
    }
}
