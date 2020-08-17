<?php

class Form
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }
    public function getForm(int $formId)
    {
        $requestHandler = new RequestHandler("GET", "form/{$formId}");
        $requestHandler->executeHttpRequest();
    }

    public function getFormQuestions($formId)
    {
        $requestHandler = new RequestHandler("GET", "form/{$formId}/questions");
        $requestHandler->executeHttpRequest();
    }

    public function getFormQuestionDetail($formId, $questionId)
    {
        $requestHandler = new RequestHandler("GET", "form/{$formId}/questions/$questionId");
        $requestHandler->executeHttpRequest();
    }

    public function createFormSubmission($formId, $createFormSubmissionDetail)
    {
        $requestHandler = new RequestHandler("POST", "form/{$formId}/submissions");
        $requestHandler->setBody($createFormSubmissionDetail);
        $requestHandler->executeHttpRequest();
    }

    public function getFormSubmissions($formId, array $formSubmissionDetail)
    {
        $requestHandler = new RequestHandler("GET", "form/$formId/submissions");
        $requestHandler->setURL($formSubmissionDetail);
        $requestHandler->executeHttpRequest();
    }

    public function getFormProperties($formId)
    {
        $requestHandler = new RequestHandler("GET", "form/{$formId}/properties");
        $requestHandler->executeHttpRequest();
    }

    public function getFormPropertyDetail($formId, $propertyKey)
    {
        $requestHandler = new RequestHandler("GET", "form/{$formId}/properties/$propertyKey");
        $requestHandler->executeHttpRequest();
    }

    public function getFormFiles($formId)
    {
        $requestHandler = new RequestHandler("GET", "form/{$formId}/files");
        $requestHandler->executeHttpRequest();
    }

    public function createFormWebhook($formId, array $webhookURL)
    {
        $requestHandler = new RequestHandler("POST", "form/{$formId}/webhooks");
        $requestHandler->setBody($webhookURL);
        $requestHandler->executeHttpRequest();
    }

    public function deleteFormWebhook($formId, $webhookId)
    {
        $requestHandler = new RequestHandler("DELETE", "form/{$formId}/webhooks/{$webhookId}");
        $requestHandler->executeHttpRequest();
    }

    public function getFormWebhooks($formId)
    {
        $requestHandler = new RequestHandler("GET", "form/{$formId}/webhooks");
        $requestHandler->executeHttpRequest();
    }

    public function getFormReports($formId)
    {
        $requestHandler = new RequestHandler("GET", "form/{$formId}/reports");
        $requestHandler->executeHttpRequest();
    }

    public function createFormReport($formId, array $formDetails)
    {
        $requestHandler = new RequestHandler("POST", "form/{$formId}/reports");
        $requestHandler->setBody($formDetails);
        $requestHandler->executeHttpRequest();
    }

    public function createFormQuestion($formId, array $questionDetail)
    {
        $requestHandler = new RequestHandler("POST", "form/{$formId}/questions");
        $requestHandler->setBody($questionDetail);
        $requestHandler->executeHttpRequest();
    }

    public function deleteFormQuestion($formId, $questionId)
    {
        $requestHandler = new RequestHandler("DELETE", "form/{$formId}/question/{$questionId}");
        $requestHandler->executeHttpRequest();
    }

    public function editFromQuestion($formId, $questionId, $questionDetail)
    { //create ile aynı mı?
        $requestHandler = new RequestHandler("POST", "form/{$formId}/questions/$questionId");
        $requestHandler->setBody($questionDetail);
        $requestHandler->executeHttpRequest();
    }

    public function setFormProperties($formId, array $formProperties, $requestType)
    {
        $requestHandler = new RequestHandler($requestType, "form/{$formId}/properties");
        $requestHandler->setBody($formProperties);
        $requestHandler->executeHttpRequest();
    }

    public function createForm($formDetail)
    {
        $requestHandler = new RequestHandler("POST", "user/forms");
        $requestHandler->setBody($formDetail);
        $requestHandler->executeHttpRequest();
    }

    public function cloneForm($formId)
    {
        $requestHandler = new RequestHandler("POST", "form/{$formId}/clone");
        $requestHandler->setBody(array());
        $requestHandler->executeHttpRequest();
    }

    public function deleteForm($formId)
    {
        $requestHandler = new RequestHandler("DELETE", "form/{$formId}");
        $requestHandler->executeHttpRequest();
    }
}