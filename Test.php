<?php

use JotForm\JotForm;

$jotForm = new JotForm("12345678");
$jotForm->setBaseURL("mycompany.jotform.api");
$jotForm->folders->getFolder("123");

$jotForm->users->getUser();
var_dump($jotForm->users->getUser());
