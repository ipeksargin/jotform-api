<?php

//namespace JotForm\Tests\tests;

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
 * Class FormTest
 */

class FormTest extends TestCase
{
    public function testGetFormWithIDShouldReturnSpecifiedForm()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["form" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["form" => "test"], $jotForm->forms->getForm("12"));
    }

    public function testGetFormQuestionsWithIDShouldReturnQuestionsInSpecifiedForm()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["question" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["question" => "test"], $jotForm->forms->getFormQuestions("12"));
    }

    public function testFormQuestionDetailWithIDShouldReturnQuestionInSpecifiedForm()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["question" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["question" => "test"], $jotForm->forms->getFormQuestionDetail("12", "1"));
    }


    public function testGetFormSubmissionsShouldReturnSubmissions()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["submissions" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["submissions" => "test"], $jotForm->forms
            ->getFormSubmissions("12", ["offset" => 1, "limit" => 1,"filter" => 1,"orderby" => 1]));
    }


    public function testGetFormPropertiesShouldReturnProperties()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["properties" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["properties" => "test"], $jotForm->forms->getFormProperties("12"));
    }

    public function testGetFormPropertyDetailShouldReturnSpecifiedPropertyDetail()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["property" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["property" => "test"], $jotForm->forms->getFormPropertyDetail("12", "1"));
    }

    public function testGetFormFilesWithIdShouldReturnSpecifiedFormFiles()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["files" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["files" => "test"], $jotForm->forms->getFormFiles("12"));
    }

    public function testGetFormWebhooksShouldReturnFormWebhooks()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["webhooks" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["webhooks" => "test"], $jotForm->forms->getFormWebhooks("12"));
    }

    public function testGetFormReportsShouldReturnFormReports()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["reports" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["reports" => "test"], $jotForm->forms->getFormReports("12"));
    }

    public function testCreateFormSubmissionShouldReturnCreatedFormSubmission()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["submission" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(
            ["submission" => "test"],
            $jotForm->forms->createFormSubmission("12", ["submission" => "test"])
        );
    }

    public function testCreateFormSubmissionsShouldReturnCreatedFormSubmissions()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["submission" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["submission" => "test"], $jotForm->forms->createFormSubmissions("12", ["one"]));
    }

    public function testCreateFormWebhooksShouldReturnCreatedFormWebhooks()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["webhooks" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["webhooks" => "test"], $jotForm->forms->createFormWebhooks("12", "url"));
    }

    public function testDeleteFormWebhooksShouldReturnDeletedFormWebhooks()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["webhooks" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["webhooks" => "test"], $jotForm->forms->deleteFormWebhooks("12", "1"));
    }

    public function testCreateFormReportShouldReturnCreatedFormReport()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["report" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["report" => "test"], $jotForm->forms->createFormReport("12", ["url"]));
    }


    public function testCreateQuestionShouldReturnCreatedFormQuestion()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["question" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["question" => "test"], $jotForm->forms->createFormQuestion("12", ["question" => "one"]));
    }

    public function testDeleteFormQuestionShouldReturnDeletedFormQuestion()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["question" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["question" => "test"], $jotForm->forms->deleteFormQuestion("12", 1));
    }

    public function testEditFormQuestionShouldReturnEditedFormQuestion()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["question" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["question" => "test"], $jotForm->forms->editFromQuestion("12", 1, ["details"]));
    }

    public function testSetFormPropertiesShouldReturnProperties()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["properties" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["properties" => "test"], $jotForm->forms->setFormProperties("12", ["properties"]));
    }

    public function testCreateFormShouldReturnCreatedForm()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["form" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["form" => "test"], $jotForm->forms->createForm(["one"]));
    }

    public function testCloneFormShouldReturnClonedForm()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["clone" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["clone" => "test"], $jotForm->forms->cloneForm(12));
    }

    public function testCreateFormsShouldReturnCreatedForms()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["form" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["form" => "test"], $jotForm->forms->createForms(["one"]));
    }

    public function testDeleteFormsShouldReturnDeletedForms()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["form" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["form" => "test"], $jotForm->forms->deleteForm("12"));
    }

    public function testGetFormShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->forms->getForm("12");
    }

    public function testGetFormQuestionsShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->forms->getFormQuestions("12");
    }

    public function testGetFormQuestionDetailShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->forms->getFormQuestionDetail("12", 1);
    }


    public function testGetFormSubmissionsShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->forms->getFormSubmissions(1, ["offset" => 1, "limit" => 1,"filter" => 1,"orderby" => 1]);
    }


    public function testGetFormPropertiesShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->forms->getFormProperties("12");
    }

    public function testGetFormPropertyDetailShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->forms->getFormPropertyDetail("12", 1);
    }

    public function testGetFormFilesShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->forms->getFormFiles("12");
    }

    public function testGetFormWebhooksShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->forms->getFormWebhooks("12");
    }

    public function testGetFormReportsShouldThrowException()
    {
        $this->expectException(Exception::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $jotForm->forms->getFormReports("12");
    }
}
