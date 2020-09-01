<?php

namespace JotForm\Resources;

/**
 * Class Submissions
 * @package JotForm\Resources
 */

class Submissions extends AbstractClient
{
    /**
     * getSubmission Get submission details.
     * @param integer $submissionId
     * @return array Returns content of the submission.
     */
    public function getSubmission($submissionId)
    {
        $response =  $this->client->request("GET", "submission/{$submissionId}");
        return $this->getBodyContent($response);
    }

    /**
     * deleteSubmission Delete a specific submission.
     * @param integer $submissionId
     * @return array Returns status of the request.
     */
    public function deleteSubmission($submissionId)
    {
        $response =  $this->client->request("DELETE", "submission/{$submissionId}");
        return $this->getBodyContent($response);
    }

    /**
     * editSubmission Edit a specific submission.
     * @param integer $submissionId
     * @param array submissionDetails contains offset, limit, filter, orderby.
     * @return array Returns content of the submission.
     */
    public function editSubmission($submissionId, array $submissionDetails)
    {
        $response = $this->client->request("POST", "submission/{$submissionId}", $submissionDetails);
        return $this->getBodyContent($response);
    }
}
