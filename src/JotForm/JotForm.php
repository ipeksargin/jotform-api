<?php

namespace JotForm;

use JotForm\ClientFunctions\Folder;
use JotForm\ClientFunctions\Form;
use JotForm\ClientFunctions\Report;
use JotForm\ClientFunctions\Submission;
use JotForm\ClientFunctions\System;
use JotForm\ClientFunctions\User;
use JotForm\JotFormAPI\RequestHandler;

class JotForm
{
    private $baseURL;
    private $apiKey;
    private $requestHandler;

    /**
     * @var User
     */
    public $users;

    /**
     * @var Form
     */
    public $forms;

    /**
     * @var Folder
     */
    public $folders;

    /**
     * @var Report
     */
    public $reports;

    /**
     * @var System
     */
    public $systems;

    /**
     * @var Submission
     */
    public $submissions;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->baseURL = 'https://api.jotform.com/';
        $this->users = new User($this);
        $this->forms = new Form($this);
        $this->folders = new Folder($this);
        $this->reports = new Report($this);
        $this->systems = new System($this);
        $this->submissions = new Submission($this);
        $this->requestHandler = new RequestHandler($apiKey);
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
    public function setBaseURL($baseURL)
    {
        $this->baseURL = $baseURL;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
