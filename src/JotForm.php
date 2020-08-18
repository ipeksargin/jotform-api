<?php

namespace JotForm;

use JotForm\Form;
use JotForm\Report;
use JotForm\Submission;
use JotForm\User;
use JotForm\Folder;
use JotForm\System;

class JotForm
{
    private string $baseURL;
    private $authToken;
    private \RequestHandler $requestHandler;

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
        $this->requestHandler = new \RequestHandler();
    }

    public function request($requestType, $endpoint, array $params = null)
    {
        return $this->requestHandler->executeHttpRequest($requestType, $this->baseURL.$endpoint, $params);
    }
    /**
     * @param string $baseURL
     */

    public function setBaseURL(string $baseURL): void
    {
        $this->baseURL = $baseURL;
    }//end setBaseURL()

    /**
     * @return mixed
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * @param mixed $authToken
     */
    public function setAuthToken($authToken): void
    {
        $this->authToken = $authToken;
    }
}
