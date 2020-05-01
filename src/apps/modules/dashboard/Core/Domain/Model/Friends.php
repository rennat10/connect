<?php

namespace Its\Example\Dashboard\Core\Domain\Model;

class Friends
{
    protected $username;
    protected $usernameTeman;

    public function __construct($username, $usernameTeman)
    {
        $this->username = $username;
        $this->usernameTeman = $usernameTeman;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getUsernameTeman()
    {
        return $this->usernameTeman;
    }
}