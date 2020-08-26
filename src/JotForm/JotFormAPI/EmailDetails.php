<?php

namespace JotForm\JotFormAPI;

class EmailDetails
{
    private $type;
    private $name;
    private $from;
    private $to;
    private $subject;
    private $html;

    /**
     * EmailDetails constructor.
     * @param $type
     * @param $name
     * @param $from
     * @param $to
     * @param $subject
     * @param $html
     */
    public function __construct(string $type, string $name, string $from, string $to, string $subject, string $html)
    {
        $this->type = $type;
        $this->name = $name;
        $this->from = $from;
        $this->to = $to;
        $this->subject = $subject;
        $this->html = $html;
    }

    public function toArray()
    {
        return $params = array("type" => $this->type, "name"=>$this->name,
            "from" =>$this->from, "to" => $this->to, "subject" =>$this->subject, "html" => $this->html);
    }
}
