<?php

require dirname(__FILE__) . "/../vendor/autoload.php";

use JotForm\JotForm;

$jotForm = JotForm::create("d1ea30ef56105ff45c1e9125aaf724c1");
var_dump($jotForm->users->getUser());
//var_dump($jotForm->forms->getForm("202162441844045"));
//var_dump($jotForm->forms->cloneForm("202162441844045"));
//print_r($jotForm->forms->deleteForm("202162441844045"));


//var_dump($jotForm->users->getFolders());
//print_r($jotForm->forms->deleteForm("202192969723968"));
//var_dump($jotForm->users->getUsage());
//var_dump($jotForm->users->getReports());
//var_dump($jotForm->forms->cloneForm("202192969723968"));
