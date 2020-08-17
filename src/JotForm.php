<?php

namespace JotForm;

use ClientController\FormController;
use ClientController\UserController;

class JotForm
{
    private string $baseURL;
    private $authToken;
    /**
     * @var UserController\UserController
     */
    public UserController\UserController $user;
    public FormController\FormController $form;
    public \FolderController $folder;

    public function __construct($authToken)
    {
        $this->authToken = $authToken;
        $this->baseURL = 'https://api.jotform.com'; //default
        //instanciate controllers
        $this->user = new UserController\UserController();
        $this->form = new FormController\FormController();
        $this->folder = new \FolderController();
    }

    /**
     * @return UserController\UserController
     */
    public function getUser(): UserController\UserController
    {
        return $this->user;
    }

    /**
     * @return FormController\FormController
     */
    public function getForm(): FormController\FormController
    {
        return $this->form;
    }

    /**
     * @return \FolderController
     */
    public function getFolder(): \FolderController
    {
        return $this->folder;
    }


    /**
     * @param string $baseURL
     */
    public function setBaseURL(string $baseURL): void
    {
        $this->baseURL = $baseURL;
    }

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
