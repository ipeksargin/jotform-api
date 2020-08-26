<?php

namespace JotForm\JotFormAPI;

use phpDocumentor\Parser\Exception;

/**
 * Class HistoryDetails
 * @package JotForm\JotFormAPI
 */
class HistoryDetails
{
    private $action;
    private $date;
    private $startDate;
    private $endDate;
    private $sortBy;

    /**
     * HistoryDetails constructor.
     * @param $action
     * @param $date
     * @param $startDate
     * @param $endDate
     * @param $sortBy
     */
    public function __construct($action, $date, $sortBy, $startDate, $endDate)
    {
        $this->action = $action;
        $this->date = $date;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->sortBy = $sortBy;
        $this->checkEnumsAreValid($action, $date, $sortBy);
    }

    public function checkEnumsAreValid($action, $date, $sortBy)
    {
        $enumAction = ["all" => true, "userCreation" => true, "userLogin" => true,
            "formCreation" => true, "formUpdate" => true, "formDelete" => true, "formPurge" => true];
        if (!$enumAction[$action]) {
            throw new Exception("Invalid action property Exception");
        }

        $enumDate = ["all" => true, "lastWeek" => true, "lastMonth" => true, "lastYear" => true,
            "last3Months" => true, "last6Months" => true];
        if (!$enumDate[$date]) {
            throw new Exception("Invalid date property Exception");
        }

        $enumSort = ["ASC" => true, "DESC" => true];
        if (!$enumSort[$sortBy]) {
            throw new Exception("Invalid sortBy property Exception");
        }
    }

    public function toArray()
    {
        return $params = array("action" => $this->action, "date"=>$this->date,
            "sortBy" =>$this->sortBy, "startDate" => $this->startDate, "endDate" =>$this->endDate);
    }
    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getSortBy()
    {
        return $this->sortBy;
    }

    /**
     * @param mixed $sortBy
     */
    public function setSortBy($sortBy): void
    {
        $this->sortBy = $sortBy;
    }
}
