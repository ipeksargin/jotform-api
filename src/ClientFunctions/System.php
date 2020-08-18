<?php

namespace JotForm;

class System extends AbstractClient
{
    public function getSystemPlan($planName)
    {
        $this->client->request("GET", "system/plan/{$planName}");
    }
}
