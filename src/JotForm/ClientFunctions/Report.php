<?php
namespace JotForm\ClientFunctions;

class Report extends AbstractClient
{
    /**
     * getReport Get report details.
     * @param [integer][$reportId]
     * @return array Returns report details like title, status, fields etc.
     */
    public function getReport($reportId)
    {
        return $this->client->request("GET", "report/{$reportId}");
    }

    /**
     * deleteReport Delete a specific report.
     * @param [integer][$reportId]
     * @return array Returns status of the request.
     */
    public function deleteReport($reportId)
    {
        return $this->client->request("DELETE", "report/{$reportId}");
    }
}
