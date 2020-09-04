<?php

namespace JotForm\Resources;

/**
 * Class Reports
 * @package JotForm\Resources
 */
class Reports extends AbstractClient
{
    /**
     * getReport Get report details.
     * @param integer $reportId
     * @return array Returns report details like title, status, fields etc.
     */
    public function getReport($reportId)
    {
        $response =  $this->client->request("GET", "report/{$reportId}");
        return $this->getBodyContent($response);
    }

    /**
     * deleteReport Delete a specific report.
     * @param integer $reportId
     * @return array Returns status of the request.
     */
    public function deleteReport($reportId)
    {
        $response =  $this->client->request("DELETE", "report/{$reportId}");
        return $this->getBodyContent($response);
    }
}
