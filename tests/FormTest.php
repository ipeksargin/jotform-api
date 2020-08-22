<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JotForm\JotForm;
use JotForm\JotFormAPI\RequestHandler;
use PHPUnit\Framework\TestCase;

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
        $this->assertEquals(["submissions" => "test"], $jotForm->forms->getFormSubmissions("12", 1, 1, 1, 1));
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
        $this->assertEquals(["webhooks" => "test"], $jotForm->forms->createFormWebhook("12", ["url"]));
    }

    public function testDeleteFormWebhooksShouldReturnDeletedFormWebhooks()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["webhooks" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["webhooks" => "test"], $jotForm->forms->deleteFormWebhook("12", "1"));
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

    public function testCreateQuestionReportShouldReturnCreatedFormQuestion()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(["content" => ["question" => "test"]])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(["handler" => $handlerStack]);

        $jotForm = new JotForm(new RequestHandler($client));
        $this->assertEquals(["question" => "test"], $jotForm->forms->createFormQuestion("12", ["url"]));
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
}
