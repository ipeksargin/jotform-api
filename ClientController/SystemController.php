<?php


class SystemController
{
    public function getSystemPlan($planName)
    {
        $requestHandler = new RequestHandler("GET", "system/plan/$planName");
        $requestHandler->executeHttpRequest();
    }
}
