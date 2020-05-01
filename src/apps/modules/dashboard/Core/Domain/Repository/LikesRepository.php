<?php

namespace Its\Example\Dashboard\Core\Domain\Repository;

interface LikesRepository
{
    public function findByUsername($username) :  Array;
    public function likesStatus($id, $username);
    public function unlikesStatus($id, $username);
    public function userLikes($id) : array;
}