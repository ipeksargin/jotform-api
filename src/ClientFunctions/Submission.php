<?php

namespace JotForm;

class Submission extends AbstractClient
{
    public function getSubmission($submissionId)
    {
        $this->client->request("GET", "submission/{$submissionId}");
    }

    public function deleteSubmission($submissionId)
    {
        $this->client->request("DELETE", "submission/{$submissionId}");
    }

    public function editSubmission($submissionId, array $submissionDetails)
    {
        $this->client->request("POST", "submission/{$submissionId}", $submissionDetails);
    }
}
