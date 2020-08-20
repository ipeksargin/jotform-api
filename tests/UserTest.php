<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testStub()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createMock(\JotForm\JotFormAPI\RequestHandler::class);

        // Configure the stub.
        $stub->method("executeHttpRequest")
            ->willReturn("username");

        // Calling $stub->doSomething() will now return
        // 'foo'.
        $this->assertEquals("username", $stub->executeHttpRequest("GET", "https://api.jotform.com/user"));
    }
}
