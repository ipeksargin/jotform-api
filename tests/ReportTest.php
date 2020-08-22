<?php


use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JotForm\JotForm;
use JotForm\JotFormAPI\RequestHandler;
use PHPUnit\Framework\TestCase;

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
}
