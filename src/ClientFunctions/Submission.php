<?php

namespace JotForm;

class Submission extends AbstractClient
{
    /**
     * getSubmission Get submission details.
     * @param [integer][$submissionId]
     * @return array Returns content of the submission.
     */
    public function getSubmission($submissionId)
    {
        return $this->client->request("GET", "submission/{$submissionId}");
    }

    /**
     * deleteSubmission Delete a specific submission.
     * @param [integer][$submissionId]
     * @return array Returns status of the request.
     */
    public function deleteSubmission($submissionId)
    {
        return $this->client->request("DELETE", "submission/{$submissionId}");
    }

    /**
     * editSubmission Edit a specific submission.
     * @param [integer][$submissionId]
     * @return array Returns content of the submission.
     */
    public function editSubmission($submissionId, array $submissionDetails)
    {
        return $this->client->request("POST", "submission/{$submissionId}");
    }
}
