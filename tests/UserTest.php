<?php

namespace JotForm\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use JotForm\Errors\AuthorizationException;
use JotForm\Errors\BadGatewayException;
use JotForm\Errors\BadRequestException;
use JotForm\Errors\ForbiddenException;
use JotForm\Errors\NotFoundException;
use JotForm\Errors\NotImplementedException;
use JotForm\Errors\ServerException;
use JotForm\Errors\ServiceUnavailableException;
use JotForm\JotForm;
use JotForm\RequestHandler;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\Request;

/**
 * Class UserTest
 */

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
        $this->assertEquals(["title" => "test"], $jotForm->users->getForms([]));
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
        $this->assertEquals(
            ["submission" => "test"],
            $jotForm->users->getSubmissions(["offset" => 1, "limit" => 1,"filter" => 1,"orderby" => 1])
        );
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


    public function testGetHistoryShouldReturnHistory()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["id"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(
            ["id" => "test"],
            $jotForm->users->getHistory(["details"])
        );
    }

    public function testCreateFormShouldCreatedForm()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["title"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["title" => "test"], $jotForm->users->createForm(["title"=>"test"]));
    }

    public function testCreateFormsShouldCreatedForms()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["title"=>"test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["title" => "test"], $jotForm->users->createForms(["title"=>"test"]));
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
            $jotForm->users->userRegister(["username" => "abc", "password" => "123", "abc@hotmail.com"])
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

    public function testGetUserShouldThrowAuthorizationException()
    {
        $this->expectException(AuthorizationException::class);

        $mock = new MockHandler([
            new Response(401),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getUser();
    }

    public function testGetUserShouldThrowBadGatewayException()
    {
        $this->expectException(BadGatewayException::class);

        $mock = new MockHandler([
            new Response(502),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getUser();
    }

    public function testGetUserShouldThrowBadRequestException()
    {
        $this->expectException(BadRequestException::class);

        $mock = new MockHandler([
            new Response(400),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getUser();
    }

    public function testGetUserShouldThrowForbiddenException()
    {
        $this->expectException(ForbiddenException::class);

        $mock = new MockHandler([
            new Response(403),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getUser();
    }

    public function testGetUserShouldThrowNotFoundException()
    {
        $this->expectException(NotFoundException::class);

        $mock = new MockHandler([
            new Response(404),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getUser();
    }

    public function testGetUserShouldThrowNotImplementedException()
    {
        $this->expectException(NotImplementedException::class);

        $mock = new MockHandler([
            new Response(501),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getUser();
    }

    public function testGetUserShouldThrowServerException()
    {
        $this->expectException(ServerException::class);

        $mock = new MockHandler([
            new Response(500),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getUser();
    }

    public function testGetUserShouldThrowServiceUnavailableException()
    {
        $this->expectException(ServiceUnavailableException::class);

        $mock = new MockHandler([
            new Response(503),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getUser();
    }

    public function testGetUserShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getUser();
    }

    public function testGetUsageShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getUsage();
    }

    public function testGetSubusersShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getSubusers();
    }

    public function testGetFormsShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getForms(["offset" => 1, "limit" => 1,"filter" => 1,"orderby" => 1]);
    }

    public function testGetSubmissionShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getSubmissions(["offset" => 1, "limit" => 1,"filter" => 1,"orderby" => 1]);
    }

    public function testGetFoldersShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getFolders();
    }

    public function testGetReportShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getReports();
    }

    public function testGetSettingShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getSettings();
    }

    public function testUserLogoutShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->userLogout();
    }

    public function testGetHistoryShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->getHistory(["lang" => "en"]);
    }

    public function testUpdateSettingsShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("POST", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->updateSettings(["lang" => "en"]);
    }

    public function testUserRegisterShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("POST", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->userRegister(["username" => "test", "password" => "123", "test@hotmail.com"]);
    }

    public function testUserLoginShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("POST", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->userLogin(["username" => "test", "password" => "123"]);
    }

    public function testCreateFormShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("POST", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->createForm(["title" => "test"]);
    }

    public function testCreateFormsShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("PUT", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->users->createForms(["title" => "test"]);
    }
}
