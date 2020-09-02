<?php

namespace JotForm\Resources;

/**
 * Class Users
 * @package JotForm\Resources
 */
class Users extends AbstractClient
{
    /**
     * getUser Get user account details for this Jotform user.
     * @param
     * @return array Returns details like username, account type, email etc.
     */
    public function getUser()
    {
        $response = $this->client->request("GET", "user");
        return $this->getBodyContent($response);
    }

    /**
     * getUsage Get number of submission received.
     * @param
     * @return array Returns details like submission count, payments, uploads etc.
     */
    public function getUsage()
    {
        $response = $this->client->request("GET", "user/usage");
        return $this->getBodyContent($response);
    }

    /**
     * getSubusers Get subuser account list.
     * @param
     * @return array Returns list of subusers and forms with access privileges.
     */
    public function getSubusers()
    {
        $response = $this->client->request("GET", "user/subusers");
        return $this->getBodyContent($response);
    }

    /**
     * getForms Get list of forms for this user.
     * @param array formDetails contains offset, limit, filter, orderby etc.
     * @return array Returns details like title, creation date etc.
     */
    public function getForms(array $formDetails)
    {
        $response =  $this->client->request("GET", "user/forms", $formDetails);
        return $this->getBodyContent($response);
    }

    /**
     * getSubmissions Get list of submissions.
     * @param array submissionDetails contains offset, limit, filter, orderby etc.
     * @return array Returns details like title, creation date etc.
     */
    public function getSubmissions(array $submissionDetails)
    {
        $response = $this->client->request("GET", "user/submissions", $submissionDetails);
        return $this->getBodyContent($response);
    }

    /**
     * getFolders Get list of folders for this account.
     * @param
     * @return array Returns details like name, owner etc.
     */
    public function getFolders()
    {
        $response = $this->client->request("GET", "user/folders");
        return $this->getBodyContent($response);
    }

    /**
     * getReports Get list of reports.
     * @param
     * @return array Returns reports including CSV, Excel, charts etc.
     */
    public function getReports()
    {
        $response = $this->client->request("GET", "user/reports");
        return $this->getBodyContent($response);
    }

    /**
     * getSettings Get settings for this account.
     * @param
     * @return array Returns account's time zone and language.
     */
    public function getSettings()
    {
        $response = $this->client->request("GET", "user/settings");
        return $this->getBodyContent($response);
    }

    /**
     * updateSettings Update settings for account.
     * @param array $params array of setting details like time zone or language.
     * @return array Returns updated settings.
     */
    public function updateSettings(array $params)
    {
        $response = $this->client->request("POST", "user/settings", $params);
        return $this->getBodyContent($response);
    }

    /**
     * getHistory Get history for this account.
     * @param array $historyDetails
     * @return array Returns updated settings.
     */
    public function getHistory(array $historyDetails)
    {
        $response = $this->client->request("GET", "user/history", $historyDetails);
        return $this->getBodyContent($response);
    }

    /**
     * userRegister Register a new user.
     * @param array $userDetails contains username, password, email.
     * @return array Returns new user's details.
     */
    public function userRegister(array $userDetails)
    {
        $response = $this->client->request("POST", "user/register", $userDetails);
        return $this->getBodyContent($response);
    }

    /**
     * userLogin Users login.
     * @param array $userDetails contains username, password, appName and accessType.
     * @return array Returns status of request.
     */
    public function userLogin(array $userDetails)
    {
        $response = $this->client->request("POST", "user/login", $userDetails);
        return $this->getBodyContent($response);
    }

    /**
     * userLogout Logout user.
     * @return array Returns status of request.
     */
    public function userLogout()
    {
        $response = $this->client->request("GET", "user/logout");
        return $this->getBodyContent($response);
    }

    /**
     * createForm Create a new form.
     * @param array $formDetails
     * @return array Returns new form.
     */
    public function createForm(array $formDetails)
    {
        $response = $this->client->request("POST", "user/forms", $formDetails);
        return $this->getBodyContent($response);
    }

    /**
     * createForm Create forms.
     * @param array $formDetails
     * @return array Returns new form.
     */
    public function createForms(array $formDetails)
    {
        $response = $this->client->request("PUT", "user/forms", $formDetails);
        return $this->getBodyContent($response);
    }
}
