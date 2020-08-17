<?php

class User extends AbstractClient
{
    public function getUser()
    {
        $this->client->request("GET", "user");
    }

    public function getUsage()
    {
        $this->client->request("GET", "user/usage");
    }

    public function getSubusers()
    {
        $this->client->request("GET", "user/subusers");
    }

    public function getForms(array $params)
    {
        $this->client->request("GET", "user/forms", $params);
    }

    public function getSubmissions(array $params)
    {
        $this->client->request("GET", "user/submissions", $params);
    }

    public function getFolders()
    {
        $this->client->request("GET", "user/folders");
    }

    public function getReports()
    {
        $this->client->request("GET", "user/reports");
    }

    public function getSettings()
    {
        $this->client->request("GET", "user/settings");
    }

    public function updateSettings(array $params)
    {
        $this->client->request("POST", "user/settings", $params);
    }

    public function getHistory(array $historyDetail)
    {
        $this->client->request("GET", "user/history", $historyDetail);
    }

    public function userRegister(array $userDetail)
    {
        $this->client->request("POST", "user/register", $userDetail);
    }

    public function userLogin(array $userDetail)
    {
        $this->client->request("POST", "user/login", $userDetail);
    }

    public function getUserLogout()
    {
        $this->client->request("GET", "user/logout");
    }

    public function createForm(array $formDetails)
    {
        $this->client->request("POST", "user/forms", $formDetails);
    }
}
