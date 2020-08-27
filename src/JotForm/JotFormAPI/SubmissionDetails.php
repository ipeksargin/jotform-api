<?php

namespace JotForm\JotFormAPI;

use phpDocumentor\Parser\Exception;

class SubmissionDetails extends Parameters
{
    private $offset;
    private $limit;
    private $orderBy;
    private $filter;

    public function __construct($offset, $limit, $filter, $orderBy)
    {
        $this->offset = $offset;
        $this->limit = $limit;
        $this->filter = $filter;
        $this->orderBy = $orderBy;
        $this->checkOrderByIsValid($orderBy);
    }

    public function checkOrderByIsValid($orderBy)
    {
        $enum = ["id" => true, "username" => true, "title"=> true,
            "status"=> true, "created_at"=> true, "updated_at"=> true, "new"=> true, "count"=> true, "slug"=> true];
        if (!$enum[$orderBy]) {
            throw new Exception("Invalid orderBy Exception");
        }
    }

    public function toArray()
    {
        return json_encode(get_object_vars($this));
    }
}
