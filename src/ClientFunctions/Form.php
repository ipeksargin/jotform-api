<?php

namespace JotForm;

class Form extends AbstractClient
{
    public function getForm(int $formId)
    {
        $this->client->request("GET", "form/{$formId}");
    }

    public function getFormQuestions($formId)
    {
        $this->client->request("GET", "form/{$formId}/questions");
    }

    public function getFormQuestionDetail($formId, $questionId)
    {
        $this->client->request("GET", "form/{$formId}/questions/$questionId");
    }

    public function createFormSubmission($formId, $createFormSubmissionDetail)
    {
        $this->client->request("POST", "form/{$formId}/submissions", $createFormSubmissionDetail);
    }

    public function getFormSubmissions($formId, array $formSubmissionDetail)
    {
        $this->client->request("GET", "form/$formId/submissions", $formSubmissionDetail);
    }

    public function getFormProperties($formId)
    {
        $this->client->request("GET", "form/{$formId}/properties");
    }

    public function getFormPropertyDetail($formId, $propertyKey)
    {
        $this->client->request("GET", "form/{$formId}/properties/$propertyKey");
    }

    public function getFormFiles($formId)
    {
        $this->client->request("GET", "form/{$formId}/files");
    }

    public function createFormWebhook($formId, array $webhookURL)
    {
        $this->client->request("POST", "form/{$formId}/webhooks", $webhookURL);
    }

    public function deleteFormWebhook($formId, $webhookId)
    {
        $this->client->request("DELETE", "form/{$formId}/webhooks/{$webhookId}");
    }

    public function getFormWebhooks($formId)
    {
        $this->client->request("GET", "form/{$formId}/webhooks");
    }

    public function getFormReports($formId)
    {
        $this->client->request("GET", "form/{$formId}/reports");
    }

    public function createFormReport($formId, array $formDetails)
    {
        $this->client->request("POST", "form/{$formId}/reports", $formDetails);
    }

    public function createFormQuestion($formId, array $questionDetail)
    {
        $this->client->request("PUT", "form/{$formId}/questions", $questionDetail);
    }

    public function deleteFormQuestion($formId, $questionId)
    {
        $this->client->request("DELETE", "form/{$formId}/question/{$questionId}");
    }

    public function editFromQuestion($formId, $questionId, $questionDetail)
    {
        $this->client->request("POST", "form/{$formId}/questions/$questionId", $questionDetail);
    }

    public function setFormProperties($formId, array $formProperties)
    {
        $this->client->request("GET", "form/{$formId}/properties", $formProperties);
    }

    public function createForm($formDetail)
    {
        $this->client->request("POST", "user/forms", $formDetail);
    }

    public function cloneForm($formId)
    {
        $this->client->request("POST", "form/{$formId}/clone");
    }

    public function deleteForm($formId)
    {
        $this->client->request("DELETE", "form/{$formId}");
    }
}
