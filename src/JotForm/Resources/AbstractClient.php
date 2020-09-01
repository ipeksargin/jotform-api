<?php

namespace JotForm\Resources;

use JotForm\JotForm;

/**
 * Class AbstractClient
 * @package JotForm\ClientFunctions
 */
abstract class AbstractClient
{
    /**
     * @var JotForm
     */
    public $client;

    /**
     * AbstractClient constructor.
     * @param JotForm $client
     */
    public function __construct(JotForm $client)
    {
        $this->client = $client;
    }

    /**
     * @param $response
     * @return mixed
     */
    protected function getBodyContent($response)
    {
        return $response["content"];
    }
}
