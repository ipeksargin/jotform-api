<?php

use JotForm\JotForm;

$jotFormUser = new JotForm("qwerdtyufghj");
$jotFormUser->setBaseURL("mycompamy.jotform.api.php");
$jotFormUser->getUser()->getReports();
$jotFormUser->user->getReports();
$jotFormUser->folder->getFolder("123");
