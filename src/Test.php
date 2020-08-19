<?php

require dirname(__FILE__) . '/../vendor/autoload.php';

use JotForm\JotForm;

$jotForm = new JotForm("9c4a3c13ddcd7916e5214af277691ffb");
//var_dump($jotForm->forms->getForm("123"));
var_dump($jotForm->users->getUser());
//var_dump($jotForm->users->getFolders());
//var_dump($jotForm->forms->cloneForm("202172772089054"));
//var_dump($jotForm->forms->deleteForm("202172772089054"));
