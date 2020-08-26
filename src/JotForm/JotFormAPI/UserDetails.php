<?php


namespace JotForm\JotFormAPI;

class UserDetails
{
    private $username;
    private $password;
    private $email;
    private $applicationName;
    private $accessType;

    /**
     * UserDetails constructor.
     * @param $username
     * @param $password
     * @param $email
     * @param $applicationName
     * @param $accessType
     */
    public function __construct(
        string $username,
        string $password,
        string $email,
        string $applicationName = null,
        string $accessType = null
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->applicationName = $applicationName;
        $this->accessType = $accessType;
    }

    public function toArray()
    {
        return $params = array("username" => $this->username, "password" => $this->password, "email" => $this->email,
            "applicationName" => $this->applicationName, "accessType" =>$this->accessType);
    }
}
