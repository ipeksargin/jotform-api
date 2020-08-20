<?php

use JotForm\JotForm;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetUserWithCorrectCredentials()
    {
        // Create a stub for the SomeClass class.
        $requestHanlderStub = $this->createMock(\JotForm\JotFormAPI\RequestHandler::class);
        $requestClient = $this->createMock(JotForm::class);

        // Configure the stub.
        $requestHanlderStub->method("executeHttpRequest")
            ->willThrowException(new \JotForm\Errors\AuthorizationException());

        // Calling $stub->doSomething() will now return
        $this->assertEquals(
            array("a","b"),
            $requestClient->users->getUser()
        );
    }
}
