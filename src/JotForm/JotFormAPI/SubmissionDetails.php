<?php

namespace JotForm\JotFormAPI;

use phpDocumentor\Parser\Exception;

class SubmissionDetails
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

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param mixed $offset
     */
    public function setOffset($offset): void
    {
        $this->offset = $offset;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @return mixed
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * @param mixed $orderBy
     */
    public function setOrderBy($orderBy): void
    {
        $this->orderBy = $orderBy;
    }

    /**
     * @return mixed
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param mixed $filter
     */
    public function setFilter($filter): void
    {
        $this->filter = $filter;
    }
}
