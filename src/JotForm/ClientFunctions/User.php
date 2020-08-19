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
        $params = array();
        $params["apiKey"] = "9c4a3c13ddcd7916e5214af277691ffb";
        return $this->client->request("GET", "user", $params);
    }

    /**
     * getUsage Get number of submission received.
     * @param
     * @return array Returns details like submission count, payments, uploads etc.
     */
    public function getUsage()
    {
        return $this->client->request("GET", "user/usage");
    }

    /**
     * getSubusers Get subuser account list.
     * @param
     * @return array Returns list of subusers and forms with access privileges.
     */
    public function getSubusers()
    {
        return $this->client->request("GET", "user/subusers");
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
        return $this->client->request("GET", "user/forms", $params);
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
        return $this->client->request("GET", "user/submissions", $params);
    }

    /**
     * getFolders Get list of folders for this account.
     * @param
     * @return array Returns details like name, owner etc.
     */
    public function getFolders()
    {
        return $this->client->request("GET", "user/folders");
    }

    /**
     * getReports Get list of reports.
     * @param
     * @return array Returns reports including CSV, Excel, charts etc.
     */
    public function getReports()
    {
        return $this->client->request("GET", "user/reports");
    }

    /**
     * getSettings Get settings for this account.
     * @param
     * @return array Returns account's time zone and language.
     */
    public function getSettings()
    {
        return $this->client->request("GET", "user/settings");
    }

    /**
     * updateSettings Update settings for account.
     * @param array $params array of setting details like time zone or language.
     * @return array Returns updated settings.
     */
    public function updateSettings(array $settingsParams)
    {
        return $this->client->request("POST", "user/settings", $settingsParams);
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
        return $this->client->request("GET", "user/history", $params);
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
        return $this->client->request("POST", "user/register", $params);
    }

    /**
     * userLogin Login user.
     * @param array $userCredentials contains username, password, appName and accessType.
     * @return array Returns status of request.
     */
    public function userLogin(array $userCredentials)
    {
        return $this->client->request("POST", "user/login", $userCredentials);
    }

    /**
     * userLogout Logout user.
     * @return array Returns status of request.
     */
    public function userLogout()
    {
        return $this->client->request("GET", "user/logout");
    }

    /**
     * createForm Create a new form.
     * @param
     * @return array Returns new form.
     */
    public function createForm(array $formDetails)
    {
        return $this->client->request("POST", "user/forms");
    }
}
