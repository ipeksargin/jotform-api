<?php


abstract class AbstractClient
{
    protected \JotForm\JotForm $client;
    public function __construct($client)
    {
        $this->client = $client;
    }
}
