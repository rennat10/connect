<?php

namespace Its\Example\Dashboard\Core\Domain\Repository;

use Its\Example\Dashboard\Core\Domain\Model\Users;

interface UserRepository
{
    public function findByUsername($username) : Users;
    public function save($nama, $username, $password, $foto, $tanggal_lahir);
    public function update($nama, $username, $foto, $tanggal_lahir);
    public function all() : array;
}