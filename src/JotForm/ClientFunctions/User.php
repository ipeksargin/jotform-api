<?php

namespace JotForm\ClientFunctions;

class User extends AbstractClient
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
     * @param integer $offset
     * @param integer $limit
     * @param string $orderBy
     * @param string $filter
     * @return array Returns details like title, creation date etc.
     */
    public function getForms($offset, $limit, $orderBy, $filter)
    {
        $params = $this->client->filterOrder($offset, $limit, $orderBy, $filter);
        $response =  $this->client->request("GET", "user/forms", $params);
        return $this->getBodyContent($response);
    }

    /**
     * getSubmissions Get list of submissions.
     * @param integer $offset
     * @param integer $limit
     * @param string $orderBy
     * @param string $filter
     * @return array Returns details like title, creation date etc.
     */
    public function getSubmissions($offset, $limit, $orderBy, $filter)
    {
        $params = $this->client->filterOrder($offset, $limit, $orderBy, $filter);
        $response = $this->client->request("GET", "user/submissions", $params);
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
    public function updateSettings(array $settingsParams)
    {
        $response = $this->client->request("POST", "user/settings", $settingsParams);
        return $this->getBodyContent($response);
    }

    /**
     * getHistory Get user activity.
     * @param $action
     * @param $date
     * @param $sortBy
     * @param string $startDate
     * @param string $endDate
     * @return array Returns updated settings.
     */
    public function getHistory($action, $date, $sortBy, $startDate, $endDate)
    {
        $params = $this->client->historyDetail($action, $date, $sortBy, $startDate, $endDate);
        $response = $this->client->request("GET", "user/history", $params);
        return $this->getBodyContent($response);
    }

    /**
     * userRegister Register a new user.
     * @param string $username
     * @param string $password
     * @param string $email
     * @return array Returns new user's details.
     */
    public function userRegister($username, $password, $email)
    {
        $params = $this->client->registerDetails($username, $password, $email);
        $response = $this->client->request("POST", "user/register", $params);
        return $this->getBodyContent($response);
    }

    /**
     * userLogin Login user.
     * @param array $userCredentials contains username, password, appName and accessType.
     * @return array Returns status of request.
     */
    public function userLogin(array $userCredentials)
    {
        $response = $this->client->request("POST", "user/login", $userCredentials);
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
     * @param
     * @return array Returns new form.
     */
    public function createForm(array $formDetails)
    {
        $response = $this->client->request("POST", "user/forms");
        return $this->getBodyContent($response);
    }
}
