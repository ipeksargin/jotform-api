<?php

namespace JotForm\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JotForm\JotForm;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use JotForm\RequestHandler;
use PHPUnit\Framework\TestCase;

/**
 * Class SystemTest
 */
class SystemTest extends TestCase
{
    public function testGetSystemPlanWithPlanNameShouldReturnSystemPlan()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["name" => "plan"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["name" => "plan"], $jotForm->systems->getSystemPlan("abc"));
    }

    public function testGetSystemPlanShouldThrowException()
    {
        $this->expectException(\Exception::class);

        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request("GET", "test"))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->systems->getSystemPlan("planName");
    }
}
