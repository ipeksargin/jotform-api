<?php

namespace JotForm\ClientFunctions;

use JotForm\JotFormAPI\PropertyDetails;
use JotForm\JotFormAPI\QuestionDetail;
use JotForm\JotFormAPI\ReportDetails;
use JotForm\JotFormAPI\SubmissionDetails;

/**
 * Class Form
 * @package JotForm\ClientFunctions
 */
class Form extends AbstractClient
{
    /**
     * getForm Get form details.
     * @param integer $formId
     * @return array Returns details like formId,status,creation dates etc.
     */
    public function getForm($formId)
    {
        $response = $this->client->request("GET", "form/{$formId}");
        return $response["content"];
    }

    /**
     * getFormQuestions Get list of all questions in the form.
     * @param integer $formId
     * @return array Returns question properties of form.
     */
    public function getFormQuestions($formId)
    {
        $response = $this->client->request("GET", "form/{$formId}/questions");
        return $response["content"];
    }

    /**
     * getFormQuestionDetails Get a specific question.
     * @param integer $formId
     * @param integer $questionId
     * @return array Returns details like if question is required or valid.
     */
    public function getFormQuestionDetail($formId, $questionId)
    {
        $response = $this->client->request("GET", "form/{$formId}/questions/$questionId");
        return $response["content"];
    }

    /**
     * createFormSubmission Create a single form submission using API.
     * @param integer $formId
     * @param array $submissionDetails
     * @return array Returns details like submissionId and URL.
     */
    public function createFormSubmission($formId, array $submissionDetails)
    {
        $response = $this->client->request("POST", "form/{$formId}/submissions", $submissionDetails);
        return $response["content"];
    }

    /**
     * createFormSubmission Create form submissions using API.
     * @param integer $formId
     * @param SubmissionDetails $submissionDetails
     * @return array Returns details like submissionId and URL.
     */
    public function createFormSubmissions($formId, array $submissionDetails)
    {
        $response = $this->client->request("PUT", "form/{$formId}/submissions", $submissionDetails);
        return $response["content"];
    }

    /**
     * getFormSubmission Get form submission.
     * @param integer $formId
     * @param SubmissionDetails $submissionDetails
     * @return array Returns details like submissionId and URL.
     */
    public function getFormSubmissions($formId, SubmissionDetails $submissionDetails)
    {
        $response = $this->client->request("GET", "form/$formId/submissions", $submissionDetails->toArray());
        return $response["content"];
    }

    /**
     * getFormProperties Get all properties in form.
     * @param integer $formId
     * @return array Returns details like width, style, expiration date etc.
     */
    public function getFormProperties($formId)
    {
        $response = $this->client->request("GET", "form/{$formId}/properties");
        return $response["content"];
    }

    /**
     * getFormPropertyDetail Get a specific property of the form.
     * @param integer $formId
     * @param integer $propertyKey
     * @return array Returns given property key.
     */
    public function getFormPropertyDetail($formId, $propertyKey)
    {
        $response = $this->client->request("GET", "form/{$formId}/properties/$propertyKey");
        return $response["content"];
    }

    /**
     * getFromFiles Get all files in form.
     * @param integer $formId
     * @return array Returns file details like name,URL etc.
     */
    public function getFormFiles($formId)
    {
        $response = $this->client->request("GET", "form/{$formId}/files");
        return $response["content"];
    }

    /**
     * createFormWebhook Create a new webhook in form.
     * @param integer
     * @param integer $formId
     * @param string $webHookURL
     * @return array Returns list of webhooks in form.
     */
    public function createFormWebhooks($formId, string $webHookURL)
    {
        $response = $this->client->request("POST", "form/{$formId}/webhooks", $webHookURL);
        return $response["content"];
    }

    /**
     * deleteFormWebhook Delete a specific webhook in form.
     * @param integer $formId
     * @param integer $webhookId
     * @return array Returns remaining list of webhooks in form.
     */
    public function deleteFormWebhooks($formId, $webhookId)
    {
        $response = $this->client->request("DELETE", "form/{$formId}/webhooks/{$webhookId}");
        return $response["content"];
    }

    /**
     * getFormWebhooks Get list of Webhooks in form.
     * @param integer $formId
     * @return array Returns list of webhooks in form.
     */
    public function getFormWebhooks($formId)
    {
        $response = $this->client->request("GET", "form/{$formId}/webhooks");
        return $response["content"];
    }

    /**
     * getFormReports Get all reports of a form including excel, csv etc.
     * @param integer $formId
     * @return array Returns list of reports in the form and report details like title.
     */
    public function getFormReports($formId)
    {
        $response = $this->client->request("GET", "form/{$formId}/reports");
        return $response["content"];
    }

    /**
     * createFormReport Create a new report of a form.
     * @param integer $formId
     * @param array $reportDetails contains report details like title, list type etc.
     * @return array Returns report details and URL.
     */
    public function createFormReport($formId, ReportDetails $reportDetails)
    {
        $response = $this->client->request("POST", "form/{$formId}/reports", $reportDetails->toArray());
        return $response["content"];
    }

    /**
     * createFormQuestion Create a new question of a form.
     * @param integer $formId
     * @param array $questionDetail
     * @return array Returns properties of new question.
     */
    public function createFormQuestion($formId, QuestionDetail $questionDetail)
    {
        $response = $this->client->request("PUT", "form/{$formId}/questions", $questionDetail->toArray());
        return $response["content"];
    }

    /**
     * deleteFromQuestion Delete a specific question in form.
     * @param integer $formId
     * @param integer $questionId
     * @return array Returns status of the request.
     */
    public function deleteFormQuestion($formId, $questionId)
    {
        $response = $this->client->request("DELETE", "form/{$formId}/question/{$questionId}");
        return $response["content"];
    }

    /**
     * editFormQuestion Add or edit a specific question in the form.
     * @param integer $formId
     * @param integer $questionId
     * @param array $questionDetail contains question detail like text, name etc.
     * @return array Returns status of the request.
     */
    public function editFromQuestion($formId, $questionId, QuestionDetail $questionDetail)
    {
        $response = $this->client->request("POST", "form/{$formId}/questions/$questionId", $questionDetail->toArray());
        return $response["content"];
    }

    /**
     * setFormProperties Add or edit properties of a specific form.
     * @param integer $formId
     * @param array $formProperties
     * @return array Returns edited properties.
     */
    public function setFormProperties($formId, PropertyDetails $formProperties)
    {
        $response = $this->client->request("POST", "form/{$formId}/properties", $formProperties->toArray());
        return $response["content"];
    }

    /**
     * createForm Create a new form.
     * @param array $formDetail
     * @return array Returns new form.
     */
    public function createForm(array $formDetail)
    {
        $response = $this->client->request("POST", "user/forms", $formDetail);
        return $response["content"];
    }

    /**
     * createForms Create multiple forms.
     * @param array $formDetail
     * @return array Returns new forms.
     */
    public function createForms(array $formDetail)
    {
        $response = $this->client->request("PUT", "user/forms", $formDetail);
        return $response["content"];
    }

    /**
     * cloneForm Clone a specific form.
     * @param integer $formId
     * @return array Returns status of the request.
     */
    public function cloneForm($formId)
    {
        $response = $this->client->request("POST", "form/{$formId}/clone");
        return $response["content"];
    }

    /**
     * deleteForm Delete a specific form.
     * @param integer $formId
     * @return array Returns status of the request.
     */
    public function deleteForm($formId)
    {
        $response = $this->client->request("DELETE", "form/{$formId}");
        return $response["content"];
    }
}
