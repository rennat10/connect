<?php

namespace Its\Example\Dashboard\Core\Domain\Repository;

use Its\Example\Dashboard\Core\Domain\Model\StatusUser;

interface StatusUserRepository
{
    public function save($username, $isi, $waktu, $foto, $likesCnt);
    public function findById($id) : StatusUser;
    public function findByUsername($username) : array;
    public function delete($id);
    public function updateLikes($id, $likesCnt);
    public function updateIsi($id, $isi, $waktu);
}