<?php

namespace Its\Example\Dashboard\Core\Domain\Model;

class Likes
{
    protected $id;
    protected $username;

    public function __construct($id, $username)
    {
        $this->id = $id;
        $this->username = $username;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }
}