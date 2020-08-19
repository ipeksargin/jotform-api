<?php

namespace JotForm\ClientFunctions;

class System extends AbstractClient
{
    /**
     * getSystemPlan Get system plan details.
     * @param [string][$planName]
     * @return array Returns details like limit, prices etc.
     */
    public function getSystemPlan($planName)
    {
        return $this->client->request("GET", "system/plan/{$planName}");
    }
}
