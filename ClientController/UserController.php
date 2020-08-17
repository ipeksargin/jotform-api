<?php

namespace ClientController\UserController;

use RequestHandler;

class UserController
{

    public function getUser()
    {
        $requestHandler = new RequestHandler("GET", "user");
        $requestHandler->executeHttpRequest();
    }

    public function getUsage()
    {
        $requestHandler = new RequestHandler("GET", "user/usage");
        $requestHandler->executeHttpRequest();
    }

    public function getSubusers()
    {
        $requestHandler = new RequestHandler("GET", "user/subusers");
        $requestHandler->executeHttpRequest();
    }

    public function getForms()
    {
        $requestHandler = new RequestHandler("GET", "user/forms");
        $requestHandler->setURL(array("offset"=>10,"limit"=>5)); //user/forms/offset=10&limit=5
        $requestHandler->executeHttpRequest();
    }

    public function getSubmissions()
    {
        $requestHandler = new RequestHandler("GET", "user/submissions");
        $requestHandler->setURL(array("offset"=>10,"limit"=>5));
        $requestHandler->executeHttpRequest();
    }

    public function getFolders()
    {
        $requestHandler = new RequestHandler("GET", "user/folders");
        $requestHandler->executeHttpRequest();
    }

    public function getReports()
    {
        $requestHandler = new RequestHandler("GET", "user/reports");
        $requestHandler->executeHttpRequest();
    }

    public function getSettings()
    {
        $requestHandler = new RequestHandler("GET", "user/settings");
        $requestHandler->executeHttpRequest();
    }

    public function updateSettings()
    {
            $requestHandler = new RequestHandler("POST", "user/settings");
            $requestHandler->setBody(array("timezone"=>"+03:00"));
            $requestHandler->executeHttpRequest();
    }

    public function getHistory($action = null, $date = null, $sortBy = null, $startDate = null, $endDate = null)
    {
        $requestHandler = new RequestHandler("GET", "user/history");
        $requestHandler->setURL(array("action"=>$action,));
        $requestHandler->executeHttpRequest();
    }

    public function userRegister(array $userDetail)
    {
        $requestHandler = new RequestHandler("POST", "user/register");
        $requestHandler->setBody($userDetail);
        $requestHandler->executeHttpRequest();
    }

    public function userLogin(array $userDetail)
    {
        $requestHandler = new RequestHandler("POST", "user/login");
        $requestHandler->setBody($userDetail);
        $requestHandler->executeHttpRequest();
    }

    public function getUserLogout()
    {
        $requestHandler = new RequestHandler("GET", "user/logout");
        $requestHandler->executeHttpRequest();
    }

    public function createForm(array $formDetails)
    {
        $requestHandler = new RequestHandler("POST", "user/forms");
        $requestHandler->setBody($formDetails);
        $requestHandler->executeHttpRequest();
    }
}
