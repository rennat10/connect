<?php

namespace Its\Example\Dashboard\Core\Application\Service\LikesStatus;

class LikesStatusRequest
{
    protected $id;
    protected $username;
    protected $likesCnt;

    public function __construct($id, $username, $likesCnt)
    {
        $this->id = $id;
        $this->username = $username;
        $this->likesCnt = $likesCnt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getLikesCnt()
    {
        return $this->likesCnt;
    }
}