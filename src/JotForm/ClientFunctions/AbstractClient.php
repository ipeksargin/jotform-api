<?php

namespace JotForm\ClientFunctions;

use JotForm\JotForm;

abstract class AbstractClient
{
    public $client;
    public function __construct(JotForm $client)
    {
        $this->client = $client;
    }

    protected function getBodyContent($response)
    {
        return $response["content"];
    }
}
