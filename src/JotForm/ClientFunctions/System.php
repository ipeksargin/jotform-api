<?php

namespace JotForm\ClientFunctions;
/**
 * Class System
 * @package JotForm\ClientFunctions
 */
class System extends AbstractClient
{
    /**
     * getSystemPlan Get system plan details.
     * @param string $planName
     * @return array Returns details like limit, prices etc.
     */
    public function getSystemPlan($planName)
    {
        $response = $this->client->request("GET", "system/plan/{$planName}");
        return $this->getBodyContent($response);
    }
}
