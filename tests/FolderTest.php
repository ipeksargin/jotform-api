<?php


use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JotForm\JotForm;
use JotForm\JotFormAPI\RequestHandler;
use PHPUnit\Framework\TestCase;

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
}
