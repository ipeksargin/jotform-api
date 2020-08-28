<?php

namespace JotForm\JotFormAPI;

use phpDocumentor\Parser\Exception;

/**
 * Class HistoryDetails
 * @package JotForm\JotFormAPI
 */
class HistoryDetails extends Parameters
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
        $this->checkActionEnumsAreValid($action);
        $this->checkDateEnumsAreValid($date);
        $this->checkSortEnumsAreValid($sortBy);
    }

    public function checkActionEnumsAreValid($action)
    {
        $enumAction = ["all" => true, "userCreation" => true, "userLogin" => true,
            "formCreation" => true, "formUpdate" => true, "formDelete" => true, "formPurge" => true];
        if (!$enumAction[$action]) {
            throw new Exception("Invalid action property Exception");
        }
    }
    public function checkDateEnumsAreValid($date)
    {
        $enumDate = ["all" => true, "lastWeek" => true, "lastMonth" => true, "lastYear" => true,
            "last3Months" => true, "last6Months" => true];
        if (!$enumDate[$date]) {
            throw new Exception("Invalid date property Exception");
        }
    }

    public function checkSortEnumsAreValid($sortBy)
    {
        $enumSort = ["ASC" => true, "DESC" => true];
        if (!$enumSort[$sortBy]) {
            throw new Exception("Invalid sortBy property Exception");
        }
    }
}
