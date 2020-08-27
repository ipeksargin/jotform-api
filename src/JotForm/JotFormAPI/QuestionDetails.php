<?php

namespace JotForm\JotFormAPI;

class QuestionDetail
{

    private $text;
    private $order;
    private $name;
    private $type;

    /**
     * QuestionDetail constructor.
     * @param $text
     * @param $order
     * @param $name
     */
    public function __construct(string $type, string $text, string $order, string $name)
    {
        $this->type = $type;
        $this->text = $text;
        $this->order = $order;
        $this->name = $name;
    }
    public function toArray()
    {
        return $params = array("type" => $this->type, "text" => $this->text,
            "order" => $this->order, "name"=> $this->name);
    }
}
