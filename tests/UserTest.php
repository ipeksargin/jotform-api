<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JotForm\JotForm;
use JotForm\JotFormAPI\RequestHandler;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetUserShouldReturnUser()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["username"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["username" => "test"], $jotForm->users->getUser());
    }

    public function testGetUsageShouldReturnUsage()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["submissions"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["submissions" => "test"], $jotForm->users->getUsage());
    }

    public function testGetFormsShouldReturnForms()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["title"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["title" => "test"], $jotForm->users->getForms(1, 1, 1, 1));
    }

    public function testGetSubusersShouldReturnSubusers()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["owner"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["owner" => "test"], $jotForm->users->getSubusers());
    }

    public function testGetFoldersShouldReturnFolders()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["name"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["name" => "test"], $jotForm->users->getFolders());
    }

    public function testGetReportsShouldReturnReports()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["report"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["report" => "test"], $jotForm->users->getReports());
    }

    public function testGetSubmissionsShouldReturnSubmissions()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["submission"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["submission" => "test"], $jotForm->users->getSubmissions(5, 5, 1, 1));
    }

    public function testGetSettingsShouldReturnSettings()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["website"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["website" => "test"], $jotForm->users->getSettings());
    }

    /**
    public function testGetHistoryShouldReturnHistory()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["id"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["id" => "test"], $jotForm->users->getHistory());
    }
    */
    public function testCreateFormShouldCreateForm()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["title"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["title" => "test"], $jotForm->users->createForm(["title"=>"test"]));
    }

    public function testUserLogoutShouldUserLoggedOut()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["status"=>"statusCode"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["status" => "statusCode"], $jotForm->users->userLogout());
    }

    public function testUpdateSettingShouldUpdate()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["status"=>"statusCode"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["status" => "statusCode"], $jotForm->users->updateSettings(["en"]));
    }

    public function testUserRegisterShouldRegisterUser()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" =>["testUser", "testPassword", "test@hotmail.com"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(
            ["testUser", "testPassword", "test@hotmail.com"],
            $jotForm->users->userRegister("ipek", "ipek123", "ipek@hotmail.com")
        );
    }

    public function testUserLoginShouldLoginUser()
    {
        $mock = new MockHandler([
            new Response(
                200,
                [],
                json_encode(["content" => ["testUser" => "abc",
                "testPassword" => "123",
                "email" =>"test@hotmail.com"]])
            ),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(
            ["testUser" => "abc",
                "testPassword" => "123",
                "email" =>"test@hotmail.com"],
            $jotForm->users->userLogin(["testUser" => "abc", "testPassword" => "123", "email" =>"test@hotmail.com"])
        );
    }
}
