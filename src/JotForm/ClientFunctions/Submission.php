<?php

namespace JotForm\ClientFunctions;

use JotForm\JotFormAPI\SubmissionDetails;

/**
 * Class Submission
 * @package JotForm\ClientFunctions
 */

class Submission extends AbstractClient
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
     * @param array $submissionDetails
     * @return array Returns content of the submission.
     */
    public function editSubmission($submissionId, SubmissionDetails $submissionDetails)
    {
        $response = $this->client->request("POST", "submission/{$submissionId}", $submissionDetails->toArray());
        return $this->getBodyContent($response);
    }
}
