<?php

namespace JotForm\JotFormAPI;

class ReportDetails
{
    private $title;
    private $type;
    private $fields;

    /**
     * ReportDetails constructor.
     * @param $title
     * @param $type
     * @param $fields
     */
    public function __construct(string $title, string $type, string $fields)
    {
        $this->title = $title;
        $this->type = $type;
        $this->fields = $fields;
    }

    public function toArray()
    {
        return $params = array("title" => $this->title, "type" => $this->type, "fields" => $this->fields);
    }
}
