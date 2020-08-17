<?php


class SubmissionController
{
    public function getSubmission($submissionId)
    {
        $requestHandler = new RequestHandler("GET", "submission/{$submissionId}");
        $requestHandler->executeHttpRequest();
    }

    public function deleteSubmission($submissionId)
    {
        $requestHandler = new RequestHandler("DELETE", "submission/{$submissionId}");
        $requestHandler->executeHttpRequest();
    }

    public function editSubmission($submissionId, array $submissionDetails)
    {
        $requestHandler = new RequestHandler("POST", "submission/{$submissionId}");
        $requestHandler->setBody($submissionDetails);
        $requestHandler->executeHttpRequest();
    }
}
