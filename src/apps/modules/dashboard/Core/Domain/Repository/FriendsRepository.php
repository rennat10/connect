<?php

namespace Its\Example\Dashboard\Core\Domain\Repository;

interface FriendsRepository
{
    public function addFriend($username, $usernameTeman);
    public function removeFriend($username, $usernameTeman);
    public function findByUsername($username) : array;
}