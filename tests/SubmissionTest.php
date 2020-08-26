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
 * Class SubmissionTest
 */
class SubmissionTest extends TestCase
{
    public function testGetSubmissionWithIDShouldReturnSpecifiedSubmission()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["name" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["name" => "test"], $jotForm->submissions->getSubmission("12"));
    }

    public function testDeleteSubmissionWithIDShouldReturnDeletedSubmission()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => [""]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals([""], $jotForm->submissions->deleteSubmission("12"));
    }

    public function testEditSubmissionWithIDShouldReturnEditedSubmission()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["submission" => "new"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(
            ["submission" => "new"],
            $jotForm->submissions->editSubmission("12", ["submission" => "new"])
        );
    }

    public function testGetSubmissionShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->submissions->getSubmission("12");
    }

    public function testDeleteSubmissionShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('DELETE', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->submissions->deleteSubmission("12");
    }

    public function testEditSubmissionShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('POST', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->submissions->editSubmission("12", ["title" => "new"]);
    }
}
