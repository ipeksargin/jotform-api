<?php

namespace JotForm\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use JotForm\JotForm;
use GuzzleHttp\Exception\RequestException;
use JotForm\RequestHandler;
use PHPUnit\Framework\TestCase;

/**
 * Class FolderTest
 */
class FolderTest extends TestCase
{
    public function testGetFolderWithIDShouldReturnSpecifiedFolder()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["owner" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["owner" => "test"], $jotForm->folders->getFolder("12"));
    }

    public function testGetFolderShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->folders->getFolder("12");
    }
}
