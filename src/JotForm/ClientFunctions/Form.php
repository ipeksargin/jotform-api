<?php

namespace JotForm\ClientFunctions;

class Form extends AbstractClient
{
    /**
     * getForm Get form details.
     * @param [integer][$formId]
     * @return array Returns details like formId,status,creation dates etc.
     */
    public function getForm($formId)
    {
        return $this->client->request("GET", "form/{$formId}");
    }

    /**
     * getFormQuestions Get list of all questions in the form.
     * @param [integer][$formId]
     * @return array Returns question properties of form.
     */
    public function getFormQuestions($formId)
    {
        return $this->client->request("GET", "form/{$formId}/questions");
    }

    /**
     * getFormQuestionDetails Get a specific question.
     * @param [integer][$formId][$questionId]
     * @return array Returns details like if question is required or valid.
     */
    public function getFormQuestionDetail($formId, $questionId)
    {
        return $this->client->request("GET", "form/{$formId}/questions/$questionId");
    }

    /**
     * createFormSubmission Create a single form submission using API.
     * @param [integer][$formId]
     * @return array Returns details like submissionId and URL.
     */
    public function createFormSubmission($formId, array $submissionDetails)
    {
        return $this->client->request("POST", "form/{$formId}/submissions", $submissionDetails);
    }

    /**
     * createFormSubmission Create form submissions using API.
     * @param [integer][$formId]
     * @return array Returns details like submissionId and URL.
     */
    public function createFormSubmissions($formId, array $createFormSubmissionDetail) //submissionDetail func
    {
        return $this->client->request("PUT", "form/{$formId}/submissions", $createFormSubmissionDetail);
    }

    /**
     * getFormSubmission Get form submission.
     * @param [integer][$formId]
     * @return array Returns details like submissionId and URL.
     */
    public function getFormSubmissions($formId, $offset, $limit, $orderBy, $filter)
    {
        $params = $this->client->filterOrder($offset, $limit, $orderBy, $filter);
        return $this->client->request("GET", "form/$formId/submissions", $params);
    }

    /**
     * getFormProperties Get all properties in form.
     * @param [integer][$formId]
     * @return array Returns details like width, style, expiration date etc.
     */
    public function getFormProperties($formId)
    {
        return $this->client->request("GET", "form/{$formId}/properties");
    }

    /**
     * getFormPropertyDetail Get a specific property of the form.
     * @param [integer][$formId][$propertyKey]
     * @return array Returns given property key.
     */
    public function getFormPropertyDetail($formId, $propertyKey)
    {
        return $this->client->request("GET", "form/{$formId}/properties/$propertyKey");
    }

    /**
     * getFromFiles Get all files in form.
     * @param [integer][$formId]
     * @return array Returns file details like name,URL etc.
     */
    public function getFormFiles($formId)
    {
        return $this->client->request("GET", "form/{$formId}/files");
    }

    /**
     * createFormWebhook Create a new webhook in form.
     * @param [integer][$formId]
     * @return array Returns list of webhooks in form.
     */
    public function createFormWebhook($formId, array $webhookURL)
    {
        return $this->client->request("POST", "form/{$formId}/webhooks", $webhookURL);
    }

    /**
     * deleteFormWebhook Delete a specific webhook in form.
     * @param [integer][$formId][$webhookId]
     * @return array Returns remaining list of webhooks in form.
     */
    public function deleteFormWebhook($formId, $webhookId)
    {
        return $this->client->request("DELETE", "form/{$formId}/webhooks/{$webhookId}");
    }

    /**
     * getFormWebhooks Get list of Webhooks in form.
     * @param [integer][$formId]
     * @return array Returns list of webhooks in form.
     */
    public function getFormWebhooks($formId)
    {
        return $this->client->request("GET", "form/{$formId}/webhooks");
    }

    /**
     * getFormReports Get all reports of a form including excel, csv etc.
     * @param [integer][$formId]
     * @return array Returns list of reports in the form and report details like title.
     */
    public function getFormReports($formId)
    {
        return $this->client->request("GET", "form/{$formId}/reports");
    }

    /**
     * createFormReport Create a new report of a form.
     * @param [integer][$formId]
     * @param array [$reportDetails] contains report details like title, list type etc.
     * @return array Returns report details and URL.
     */
    public function createFormReport($formId, array $reportDetails)
    {
        return $this->client->request("POST", "form/{$formId}/reports", $reportDetails);
    }

    /**
     * createFormQuestion Create a new question of a form.
     * @param [integer][$formId]
     * @return array Returns properties of new question.
     */
    public function createFormQuestion($formId, array $questionDetail)
    {
        return $this->client->request("PUT", "form/{$formId}/questions", $questionDetail);
    }

    /**
     * deleteFromQuestion Delete a specific question in form.
     * @param [integer][$formId]
     * @param [integer] [$questionId]
     * @return array Returns status of the request.
     */
    public function deleteFormQuestion($formId, $questionId)
    {
        return $this->client->request("DELETE", "form/{$formId}/question/{$questionId}");
    }

    /**
     * editFormQuestion Add or edit a specific question in the form.
     * @param [integer][$formId]
     * @param [integer][$questionId]
     * @param array $questionDetail contains question detail like text, name etc.
     * @return array Returns status of the request.
     */
    public function editFromQuestion($formId, $questionId, array $questionDetail)
    {
        return $this->client->request("POST", "form/{$formId}/questions/$questionId", $questionDetail);
    }

    /**
     * setFormProperties Add or edit properties of a specific form.
     * @param [integer][$formId]
     * @return array Returns edited properties.
     */
    public function setFormProperties($formId, array $formProperties)
    {
        return $this->client->request("POST", "form/{$formId}/properties", $formProperties);
    }

    /**
     * createForm Create a new form.
     * @param
     * @return array Returns new form.
     */
    public function createForm($formDetail) //formDetails func
    {
        return $this->client->request("POST", "user/forms");
    }

    /**
     * createForms Create multiple forms.
     * @param
     * @return array Returns new forms.
     */
    public function createForms($formDetail) //formDetails func
    {
        return $this->client->request("POST", "user/forms");
    }

    /**
     * cloneForm Clone a specific form.
     * @param [integer][$formId]
     * @return array Returns status of the request.
     */
    public function cloneForm($formId)
    {
        return $this->client->request("POST", "form/{$formId}/clone");
    }

    /**
     * deleteForm Delete a specific form.
     * @param [integer][$formId]
     * @return array Returns status of the request.
     */
    public function deleteForm($formId)
    {
        return $this->client->request("DELETE", "form/{$formId}");
    }
}
