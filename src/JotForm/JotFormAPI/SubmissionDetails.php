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

    /**
     * @param int $offset
     * @param int $limit
     * @param string|null $orderBy
     * @param string|null $filter
     * @return array
     */
    public function toArray()
    {
        return $params = array("offset" => $this->offset, "limit" => $this->limit,
            "filter" => json_encode($this->filter), "orderBy" => $this->orderBy);
    }
}
