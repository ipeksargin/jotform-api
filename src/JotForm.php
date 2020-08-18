<?php

namespace JotForm;

use JotForm\Form;
use JotForm\Report;
use JotForm\Submission;
use JotForm\User;
use JotForm\Folder;
use JotForm\System;
use JotForm\RequestHandler;

class JotForm
{
    private string $baseURL;
    private string $authToken;
    private RequestHandler $requestHandler;

    /**
     * @var User
     */
    public User $users;

    /**
     * @var Form
     */
    public Form $forms;

    /**
     * @var Folder
     */
    public Folder $folders;

    /**
     * @var Report
     */
    public Report $reports;

    /**
     * @var System
     */
    public System $systems;

    /**
     * @var Submission
     */
    public Submission $submissions;

    public function __construct($authToken)
    {
        $this->authToken = $authToken;
        $this->baseURL = 'https://api.jotform.com';
        $this->users = new User($this);
        $this->forms = new Form($this);
        $this->folders = new Folder($this);
        $this->reports = new Report($this);
        $this->systems = new System($this);
        $this->submissions = new Submission($this);
        $this->requestHandler = new RequestHandler();
    }

    public function assocArr(array $details)
    {
        $newArr = array();
        foreach ($details as $key => $value) {
            $newArr[$key] = $value;
        }
        return $newArr;
    }

    public function registerDetails($username, $password, $email)
    {
        return $params = array($username, $password, $email);
    }

    public function historyDetail($action = null, $date = null, $sortBy = null, $startDate = null, $endDate = null)
    {
        return $params = array($action, $date, $sortBy, $startDate, $endDate);
    }

    public function filterOrder($offset = 0, $limit = 0, $orderBy = null, $filter = null)
    {
        return $params = array($offset, $limit, $orderBy, json_encode($filter));
    }

    public function request($requestType, $endpoint, $params = null)
    {
        return $this->requestHandler->executeHttpRequest($requestType, $this->baseURL.$endpoint, $params);
    }

    /**
     * @param string $baseURL
     */
    public function setBaseURL(string $baseURL)
    {
        $this->baseURL = $baseURL;
    }

    /**
     * @return string
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * @param string $authToken
     */
    public function setAuthToken(string $authToken)
    {
        $this->authToken = $authToken;
    }
}
