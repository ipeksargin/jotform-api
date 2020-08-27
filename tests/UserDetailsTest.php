<?php

use JotForm\JotFormAPI\HistoryDetails;
use PHPUnit\Framework\TestCase;

class UserDetailsTest extends TestCase
{
    public function testUserDetailToArray()
    {
        $class = new HistoryDetails("user", "123", "usermail", "appname", "no");

        $new = $class->toArray();
        $this->assertEquals(array("username" => "user", "password" => "123",
            "email" => "usermail", "applicationName" => "appname", "accessType" => "no"), $new);
    }
}
