<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JotForm\JotForm;
use JotForm\JotFormAPI\RequestHandler;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * Class ReportTest
 */
class ReportTest extends TestCase
{
    public function testGetReportWithIDShouldReturnSpecifiedReport()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["name" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["name" => "test"], $jotForm->reports->getReport("12"));
    }
    public function testDeleteReportWithIDShouldDeleteSpecifiedReport()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => [""]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals([""], $jotForm->reports->deleteReport("12"));
    }

    public function testGetReportShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->reports->getReport("12");
    }

    public function testDeleteReportShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('DELETE', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->reports->deleteReport("12");
    }
}
