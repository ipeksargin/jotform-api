<?php


class HttpResponse
{
    private $statusCode;
    private $responseMessage;
    private $limitLeft;
    private $content;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return mixed
     */
    public function getResponseMessage()
    {
        return $this->responseMessage;
    }

    /**
     * @param mixed $responseMessage
     */
    public function setResponseMessage($responseMessage): void
    {
        $this->responseMessage = $responseMessage;
    }

    /**
     * @return mixed
     */
    public function getLimitLeft()
    {
        return $this->limitLeft;
    }

    /**
     * @param mixed $limitLeft
     */
    public function setLimitLeft($limitLeft): void
    {
        $this->limitLeft = $limitLeft;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }


}