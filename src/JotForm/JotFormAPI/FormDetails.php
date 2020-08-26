<?php

namespace JotForm\JotFormAPI;

class FormDetails
{
    private $questionDetail;
    private $emailDetails;
    private $title;
    private $height;

    public function __construct(QuestionDetail $questionDetail, EmailDetails $emailDetails, string $title, int $height)
    {
        $this->questionDetail = $questionDetail->toArray();
        $this->emailDetails = $emailDetails->toArray();
        $this->title = $title;
        $this->height = $height;
    }

    public function toArray()
    {
        return $params = array("questions" => array(array(
            "type" => $this->questionDetail[0],
            "text" => $this->questionDetail[1],
            "order" => $this->questionDetail[2],
            "name" => $this->questionDetail[3]),
        ),
            "properties" => array(
                "title" => $this->title,
                "height" => $this->height,
            ),
            "email" => array(
                "type" => $this->emailDetails[0],
                "name" => $this->emailDetails[1],
                "from" => $this->emailDetails[2],
                "to" => $this->emailDetails[3],
                "subject" => $this->emailDetails[4],
                "html" => $this->emailDetails[5],
            )
        );
    }
}
